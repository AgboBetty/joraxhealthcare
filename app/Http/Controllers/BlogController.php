<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest\UpdateBlogRequest;
use App\Http\Requests\BlogRequest\StoreBlogRequest;
use App\Http\Requests\BlogRequest\SingleBlogRequest;
use App\Http\Requests\BlogRequest\ParamSingleBlogRequest;
use App\Helpers\MediaProcessors;


class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
        $this->middleware('rank:level2')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all blog posts
        $blog= blog::orderBy('created_at', 'desc')->take(150)->paginate(30);

        if ($blog) {
            return view('outerpages.blogs')->with('page_data',$blog->toArray());
        }

        return view('outerpages.blogs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get return resource creation page
        return view('innerpages.createblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        // Store the resource
        $blog = new Blog;

        $blog->fill($request->toArray());
        $blog->user_id = $request->user()->id;

        if ($request->file('photo') && $request->input('no_image')==null) {

            // Store new images to server or cloud service
            $processed_image = MediaProcessors::storeImage(
                $request->file('photo'), 
                'public/images/blog' 
            );

            // If image was saved successfully
            if ($processed_image) {
                $blog->image_url = '/storage/images/blog/'.$processed_image->file_name;
            }
        }

        // Check if default image was selected, is so override with default
        if ($request->input('no_image')) {
            $blog->image_url = '/assets/img/blog/default.png';
        }

        // Check for image is present else replace with default
        $blog->image_url? '':$blog->image_url = '/assets/img/blog/default.png';

        if ($blog->save()) {
            // Return success
            $request->session()->now('success', 'Task was successful!');
            return view('outerpages.blog')->with('page_data',$blog->toArray());
        }

        // Return failure
        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(ParamSingleBlogRequest $request, $id)
    {
        // Get single resource
        $blog = Blog::find($request->id);

        if ($blog) {
            // Return success
            return view('outerpages.blog')->with('page_data',$blog->toArray());
        }

        // Return failure
        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(ParamSingleBlogRequest $request, $id)
    {
        // Get a single resource for editing
        $blog = Blog::find($request->id);

        if ($blog) {
            // Return success
            return view('innerpages.editblog')->with('page_data',$blog->toArray());
        }

        // Return failure
        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request)
    {
        // Update a single resource
        $blog = Blog::find($request->input('id'));

        $blog->fill($request->toArray());

        if ($request->file('photo') && $request->input('no_image')==null) {

            // Store new images to server or cloud service
            $processed_image = MediaProcessors::storeImage(
                $request->file('photo'), 
                'public/images/blog' 
            );

            // If image was saved successfully
            if ($processed_image) {
                $blog->image_url = '/storage/images/blog/'.$processed_image->file_name;
            }
        }

        // Check for image is present else replace with default
        $blog->image_url? '':$blog->image_url = '/assets/img/blog/default.png';

        // Check if default image was selected, is so override with default
        if ($request->input('no_image')) {
            $blog->image_url = '/assets/img/blog/default.png';
        }

        if ($blog->save()) {
            // Return success
            $request->session()->now('success', 'Task was successful!');
            return view('outerpages.blog')->with('page_data',$blog->toArray());
        }

        // Return failure
        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(SingleBlogRequest $request)
    {
        // Delete a single resource
        $blog = Blog::find($request->input('id'));

        if ($blog && $blog->delete()) {
            // Return success
            $request->session()->now('success', 'Task was successful!');
            return $this->index();
        }

        // Return failure
        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }
}
