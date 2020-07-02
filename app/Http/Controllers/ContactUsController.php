<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests\ContactUsRequest\StoreContactUsRequest;
use App\Http\Requests\ContactUsRequest\SingleContactUsRequest;
use App\Http\Requests\ContactUsRequest\ParamSingleContactUsRequest;

class ContactUsController extends Controller
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
        // Get all user sent messages
        $contact_us = ContactUs::orderBy('created_at', 'desc')->take(150)->paginate(30);

        if ($contact_us) {
            return view('admin.outerpages.notifications')->with('page_data',$contact_us->toArray());
        }

        return view('admin.outerpages.notifications');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactUsRequest $request)
    {
        $contact_us = new ContactUs;
        $contact_us->fill($request->toArray());

        // Add additional data
        $contact_us->device_details = json_encode(\Request::header('User-Agent'), true);
        $contact_us->ip_address_current = (string)\Request::ip();

        if ($contact_us->save()) {
            $request->session()->flash('info', 'Your Message Was Delivered');
            return back(); 
        }

        $request->session()->flash('warning', 'Unable to deliver your message');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(ParamSingleContactUsRequest $request, $id)
    {
        // Get specific message
        $contact_us = ContactUs::find($id);

        if ($contact_us) {
            return view('admin.outerpages.notification')->with('page_data',$contact_us->toArray());
        }

        $request->session()->flash('warning', 'Unable to find the message');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(SingleContactUsRequest $request)
    {
        // Delete specific message
        $contact_us = ContactUs::find($request->input('id'));

        if ($contact_us && $contact_us->delete()) {
            return $this->index();
        }

        $request->session()->flash('warning', 'Unable to delete the message');
        return back();
    }
}
