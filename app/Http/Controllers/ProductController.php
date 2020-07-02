<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ProductRequest\StoreProductRequest;
use App\Http\Requests\ProductRequest\SingleProductRequest;
use App\Http\Requests\ProductRequest\UpdateProductRequest;
use App\Http\Requests\ProductRequest\ParamSingleProductRequest;
use App\Helpers\MediaProcessors;

class ProductController extends Controller
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
        // Get all product items and rates
        $product = Product::take(150)->paginate(30);

        // Specific sort
        $product = $product->sortBy('name');
        $product = $product->groupBy('type');
        $product = $product->map(function ($item, $key) {
            return $item->chunk(3);
        });
        return view('outerpages.product')->with('page_data',$product->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a new product item
        return view('admin.outerpages.product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // Save created product
        $product = new Product;
        $product->fill($request->toArray());
        $product->user_id = $request->user()->id;

        if ($request->file('photo')) {
            
            // Store new images to server or cloud service
            $processed_image = MediaProcessors::storeImage(
                $request->file('photo'), 
                'public/images/product' 
            );

            // If image was saved successfully
            if ($processed_image) {
                $product->image = '/storage/images/product/'.$processed_image->file_name;
            }
        }

        // Check for image is present else replace with default
        $product->image? '':$product->image = '/assets/img/default/default.png';

        if ($product->save()) {

            // Clear cache
            Cache::forget('const');
            $request->session()->now('success', 'Task was successful!');
           
            // Return all product items
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
        // Get all product item
        $product = Product::all();

        if ($product) {
            return view('admin.outerpages.products')->with('page_data',$product->toArray());
        }

        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(ParamSingleProductRequest $request, $id)
    {
        // Edit an product
        $product = Product::find($request->id);

        if ($product) {
            return view('admin.outerpages.product')->with('page_data',$product->toArray());
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
    public function update(UpdateProductRequest $request)
    {
        // Update edited product
        $product = Product::find($request->input('id'));

        if ($product) {
            $product->fill($request->toArray());
            $product->user_id = $request->user()->id;

            if ($product->save()) {

                // Clear cache
                Cache::forget('const');
                $request->session()->now('success', 'Task was successful!');

                // Return all product items
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
    public function destroy(SingleProductRequest $request)
    {
        // Delete an product
        $product = Product::find($request->input('id'));

        if ($product) {
            if ($product->delete()) {
                // Clear cache
                Cache::forget('const');
                $request->session()->now('success', 'Task was successful!');

                // Return all product items
                return $this->show();
            }
        }

        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }
}
