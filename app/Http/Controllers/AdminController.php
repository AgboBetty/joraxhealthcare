<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\RankValidator;
use Illuminate\Http\Request;
use App\Models\BusinessIntelligence;
use Carbon\Carbon;

class AdminController extends Controller
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
        
        $this->rank_validator = new RankValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->rank_validator->check('level4')) {

            // Get all users that are not admin
            $user = User::where('rank','<>',$this->rank_validator->explain('level1'))->take(150)->paginate(30);

            if ($user) {
                $user = $user->toArray();
            } else {
                $user = [];
            }

            // Return success
            return view('admin.outerpages.dashboard')->with('page_data',array_merge(
                ['admins'=>$user]
            ));
        }

        return view('admin.outerpages.dashboard');
    }
}
