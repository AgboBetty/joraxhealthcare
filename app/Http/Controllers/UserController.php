<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\PostTrade;
use App\Helpers\Helper;
use App\Helpers\RankValidator;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest\SearchUserRequest;
use App\Http\Requests\UserRequest\ParamSingleUserRequest;
use App\Http\Requests\UserRequest\SingleUserRequest;
use App\Http\Requests\UserRequest\UpdateUserRequest;


class UserController extends Controller
{
    public $rank_validator;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rank:level3');
        $this->middleware('rank:level4')->only('bvn','approveBVN','rejectBVN','makeAdmin','makeUser','makeEditor');

        $this->rank_validator = new RankValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('rank','<>',$this->rank_validator->explain('level4'))->take(150)->paginate(30);

        // Return Success
        return view('admin.outerpages.users')->with('page_data', $users->toArray());
    }

    /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(SearchUserRequest $request)
    {
        $name = is_null($request->input('name'))?$request->user()->name
        :Helper::escapeLikeForQuery($request->input('name'));

        $users = User::with(['profile'])->where('rank','<>',$this->rank_validator->explain('level4'))
        ->where(function ($query) use ($name) {
            $query->where('name','like','%'.$name.'%')
            ->orWhere('email', 'like', '%'.$name.'%')
            ->orWhere('id', 'like', '%'.$name.'%');
        })->take(150)->paginate(30);

        // Return Success
        return view('admin.outerpages.users')->with('page_data', $users->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ParamSingleUserRequest $request, $id)
    {
        $user = User::with(['profile'])->where('rank','<>',$this->rank_validator->explain('level4'))->find($id);

        if ($user) {
            // Return Success
            return view('admin.outerpages.user')->with('page_data', $user->toArray());
        }

        // Return failure
        $request->session()->flash('warning','User does not exist!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $user = User::with('profile')->where('rank','<>',$this->rank_validator->explain('level4'))->find($request->input('id'));

        if ($user) {

            $input = $request->only(['mail', 'phone', 'address', 'city', 'state', 'country', 'zip']);
            $profile = Profile::where('id',$user->profile->id)->update($input);

            if ($profile) {

                $user = $user->toArray();
                foreach ($input as $key => $value) {
                    $user['profile'][$key]=$value;
                }

                // Return Success
                $request->session()->now('success','Task was successful!');
                return view('admin.outerpages.user')->with('page_data',$user);
            }

            // Return failure
            $request->session()->flash('error','Task was not Successful!');
            return back();
        }

        // Return failure
        $request->session()->flash('warning','User does not exist!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blockUser(SingleUserRequest $request)
    {
        $user = User::with(['profile'])->find($request->input('id'));

        if ($user && $user->blocked == true) {
            // Return failure
            $request->session()->flash('warning', 'User Account is already blocked!');
            return back();
        }

        if ($user && $user->blocked == false && $user->rank != $this->rank_validator->explain('level4')) {
            $user->blocked = true;

            if ($user->save()) {

                // Delete all blocked users trades
                $user_posts = PostTrade::where('user_id', $user->id)->delete();

                // Return Success
                $request->session()->now('success','User Account has been blocked!');
                return view('admin.outerpages.user')->with('page_data', $user->toArray());
            }
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
    public function unBlockUser(SingleUserRequest $request)
    {
        $user = User::with(['profile'])->find($request->input('id'));

        if ($user && $user->blocked == false) {
            // Return failure
            $request->session()->flash('warning', 'User Account is not blocked!');
            return back();
        }

        if ($user && $user->blocked == true) {
            $user->blocked = false;

            if ($user->save()) {
                // Return Success
                $request->session()->now('success','User Account has been unblocked!');
                return view('admin.outerpages.user')->with('page_data', $user->toArray());
            }
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
    public function makeAdmin(SingleUserRequest $request)
    {
        $user = User::with(['profile'])->where('rank','<>',$this->rank_validator->explain('level4'))->find($request->input('id'));

        if ($user && $user->rank == $this->rank_validator->explain('level3')) {
            // Return failure
            $request->session()->flash('warning', 'User is already an admin!');
            return back();
        }

        if ($user && $user->rank != $this->rank_validator->explain('level4')) {
            $user->rank = $this->rank_validator->explain('level3');

            if ($user->save()) {

                // Return Success
                $request->session()->now('success','User Account has been upgraded to admin!');
                return view('admin.outerpages.user')->with('page_data', $user->toArray());
            }
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
    public function makeUser(SingleUserRequest $request)
    {
        $user = User::with(['profile'])->find($request->input('id'));

        if ($user && $user->rank == $this->rank_validator->explain('level1')) {
            // Return failure
            $request->session()->flash('warning', 'User is only a simple user!');
            return back();
        }

        if ($user && $user->rank != $this->rank_validator->explain('level4')) {
            $user->rank = $this->rank_validator->explain('level1');

            if ($user->save()) {
                // Return Success
                $request->session()->now('success','User Account has been downgraded to user!');
                return view('admin.outerpages.user')->with('page_data', $user->toArray());
            }
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
    public function makeEditor(SingleUserRequest $request)
    {
        $user = User::with(['profile'])->find($request->input('id'));

        if ($user && $user->rank == $this->rank_validator->explain('level2')) {
            // Return failure
            $request->session()->flash('warning', 'User is an editor!');
            return back();
        }

        if ($user && $user->rank != $this->rank_validator->explain('level4')) {
            $user->rank = $this->rank_validator->explain('level2');

            if ($user->save()) {
                // Return Success
                $request->session()->now('success','User account has been upgraded to content editor!');
                return view('admin.outerpages.user')->with('page_data', $user->toArray());
            }
        }

        // Return failure
        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }

}
