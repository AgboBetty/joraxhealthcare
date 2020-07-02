<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SubscriptionRequest\StoreSubscriptionRequest;
use App\Http\Requests\SubscriptionRequest\UpdateSubscriptionRequest;
use App\Http\Requests\SubscriptionRequest\SingleSubscriptionRequest;
use App\Http\Requests\SubscriptionRequest\ParamSingleSubscriptionRequest;

class SubscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('store');
        $this->middleware('rank:level3')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all user sent subscriptions
        $subscription = Subscription::where('status', true)->orderBy('created_at', 'desc')->take(150)->paginate(30);

        if ($subscription) {
            return view('admin.outerpages.subscriptions')->with('page_data',$subscription->toArray());
        }

        return view('admin.outerpages.subscriptions');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        // Declare file and file directory names
        $file_name = 'subscribers.txt';
        $file_directory = 'subscribers';

        // Get all user sent subscriptions
        $subscriptions = Subscription::where('status', true)->orderBy('created_at', 'desc')->get();

        if ($subscriptions) {

            $subscriptions = $subscriptions->pluck('email')->toArray();

            $contents = \implode(",",$subscriptions);
    
            // Save File
            Storage::put($file_directory.'/'.$file_name, $contents);

            // Check if file exists
            if (Storage::exists($file_directory.'/'.$file_name)) {
                // Return with file
                return Storage::download($file_directory.'/'.$file_name, $file_name);
            }
        }

        $request->session()->flash('warning', 'No current subscribers');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $subscription = Subscription::updateOrCreate(
            ['email' => $request->input('email')],
            ['unsubscribe_code' => \uniqid(),'status' => 1]
        );

        if ($subscription) {
            $request->session()->flash('info', 'Your Subscription Was Added');
            return back(); 
        }

        $request->session()->flash('warning', 'Unable to add your subscription');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionRequest $request)
    {
        // Update edited team
        $subscription = Subscription::where('unsubscribe_code', $request->input('code'))
        ->where('email', $request->input('email'))->first();

        if ($subscription) {
            $subscription->status = false;

            if ($subscription->save()) {
                $request->session()->flash('success', 'Task was successful!');

                // Return all subscription
                return redirect('/');
            }
        }

        $request->session()->flash('error', 'Task was not successful!');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(ParamSingleSubscriptionRequest $request, $id)
    {
        // Get specific subscription
        $subscription = Subscription::find($id);

        if ($subscription) {
            return view('admin.outerpages.subscription')->with('page_data',$subscription->toArray());
        }

        $request->session()->flash('warning', 'Unable to find the subscription');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(SingleSubscriptionRequest $request)
    {
        // Delete specific subscription
        $subscription = Subscription::find($request->input('id'));

        if ($subscription && $subscription->delete()) {
            return $this->index();
        }

        $request->session()->flash('warning', 'Unable to delete the subscription');
        return back();
    }
}
