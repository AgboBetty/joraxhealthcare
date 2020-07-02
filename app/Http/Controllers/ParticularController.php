<?php

namespace App\Http\Controllers;

use App\Models\Particular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ParticularRequest\StoreParticularRequest;
use App\Http\Requests\ParticularRequest\SingleParticularRequest;
use App\Http\Requests\ParticularRequest\UpdateParticularRequest;
use App\Http\Requests\ParticularRequest\ParamSingleParticularRequest;
use App\Helpers\MediaProcessors;

class ParticularController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
        $this->middleware('rank:level3')->except('index');
        $this->middleware('rank:level4')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all particular items and rates
        $particular = Particular::all();
        return view('admin.outerpages.particulars')->with('page_data',$particular->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a new particular item
        return view('admin.outerpages.particular');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParticularRequest $request)
    {
        // Save created particular
        $particular = new Particular;
        $particular->fill($request->toArray());
        $particular->user_id = $request->user()->id;

        if ($request->file('photo')) {
            
            // Store new images to server or cloud service
            $processed_image = MediaProcessors::storeImage(
                $request->file('photo'), 
                'public/images/particular' 
            );

            // If image was saved successfully
            if ($processed_image) {
                $particular->image = '/storage/images/particular/'.$processed_image->file_name;
            }
        }

        // Check for image is present else replace with default
        $particular->image? '':$particular->image = '/assets/img/default/default.png';

        if ($particular->save()) {
            // Clear cache
            Cache::forget('const');
            $request->session()->now('success', 'Task was successful!');
           
            // Return all particular items
           return $this->show();
        }

        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Get all particular item
        $particular = Particular::all();

        if ($particular) {
            return view('admin.outerpages.particulars')->with('page_data',$particular->toArray());
        }

        $request->session()->now('error', 'Task was not successful!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(ParamSingleParticularRequest $request, $id)
    {
        // Edit an particular
        $particular = Particular::find($request->id);

        if ($particular) {
            return view('admin.outerpages.particular')->with('page_data',$particular->toArray());
        }

        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParticularRequest $request)
    {
        // Update edited particular
        $particular = Particular::find($request->input('id'));

        if ($particular) {
            $particular->fill($request->toArray());
            $particular->user_id = $request->user()->id;

            if ($particular->save()) {
                // Clear cache
                Cache::forget('const');
                $request->session()->now('success', 'Task was successful!');

                // Return all particular items
                return $this->show();
            }
        }

        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(SingleParticularRequest $request)
    {
        // Delete an particular
        $particular = Particular::find($request->input('id'));

        if ($particular) {
            if ($particular->delete()) {
                // Clear cache
                Cache::forget('const');
                $request->session()->now('success', 'Task was successful!');

                // Return all particular items
                return $this->show();
            }
        }

        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }
}
