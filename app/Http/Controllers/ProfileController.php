<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Mail\PasswordChangedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileRequest\UpdateProfileRequest;
use App\Http\Requests\ProfileRequest\UpdatePasswordProfileRequest;
use App\Http\Requests\ProfileRequest\UpdateBankingProfileRequest;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rank:level1');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Get a single user profile
        $profile = Profile::with('user')->where('user_id', $request->user()->id)->first();

        if ($profile) {
            return view('innerpages.profile')->with('page_data',$profile->toArray());
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
    public function updateProfile(UpdateProfileRequest $request)
    {
        // Update edited trade
        $profile = Profile::with('user')->where('user_id', $request->user()->id)->first();

        // Check if profile was found and that it belongs to user
        if ($profile && ($profile->user_id === $request->user()->id)) {
            $profile->fill($request->toArray());

            if ($profile->save()) {
                $request->session()->now('success', 'Task was successful!');
                
                // Return the saved post
                return Redirect::back()->with('page_data',$profile->toArray());
            }
        }

        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

    /**
     * Change a user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordProfileRequest $request)
    {
        // Check if user exists
        $user = User::find(auth()->user()->id);

        // Exit if user was not found
        if (!$user || $user->id !== $request->user()->id) {
            $request->session()->flash('error', 'Task was not successful!');
            return back();
        }

        // Check if old password input matches password record
        if (!Hash::check($request->input('old_password'), $user->password)) {
            $request->session()->flash('warning', 'Old password is incorrect');
            return back();
        }

        // Make a new password
        $user->password = Hash::make($request->input('new_password'));

        // Save new password
        if (!$user->save()){
            $request->session()->flash('error', 'Task was not successful!');
            return back();
        }

        // View email to be sent --testing purposes only
        if (env('APP_ENV')=='local') {
            // return (new PasswordChangedMail([
            //     'message' => 'Your Password Was Change On '.date('l jS \of F Y h:i:s A')
            // ]))->render();
        }

        // Send an email to user informing about password change
        if (env('APP_ENV')=='production') {
            Mail::to($request->user())->send(new PasswordChangedMail([
                'message' => 'Your Password Was Change On '.date('l jS \of F Y h:i:s A')
            ]));
        }

        // Logout user
        auth()->logout();

        // Return success
        $request->session()->flash('success', 'Reset successful, please login again');
        return redirect('/');
    }
}
