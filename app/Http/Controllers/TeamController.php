<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\TeamRequest\StoreTeamRequest;
use App\Http\Requests\TeamRequest\SingleTeamRequest;
use App\Http\Requests\TeamRequest\UpdateTeamRequest;
use App\Http\Requests\TeamRequest\ParamSingleTeamRequest;
use App\Helpers\MediaProcessors;

class TeamController extends Controller
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
        // Get all team items and rates
        $team = Team::take(150)->paginate(30);

        // Specific sort
        $team = $team->sortBy('name');
        $team = $team->groupBy('type');
        $team = $team->map(function ($item, $key) {
            return $item->chunk(3);
        });
        return view('outerpages.team')->with('page_data',$team->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a new team item
        return view('admin.outerpages.team');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        // Save created team
        $team = new Team;
        $team->fill($request->toArray());
        $team->user_id = $request->user()->id;

        if ($request->file('photo')) {
            
            // Store new images to server or cloud service
            $processed_image = MediaProcessors::storeImage(
                $request->file('photo'), 
                'public/images/team' 
            );

            // If image was saved successfully
            if ($processed_image) {
                $team->image = '/storage/images/team/'.$processed_image->file_name;
            }
        }

        // Check for image is present else replace with default
        $team->image? '':$team->image = '/assets/img/default/default.png';

        if ($team->save()) {
            // Clear cache
            Cache::forget('const');
            $request->session()->now('success', 'Task was successful!');
           
            // Return all team items
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
        // Get all team item
        $team = Team::all();

        if ($team) {
            return view('admin.outerpages.teams')->with('page_data',$team->toArray());
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
    public function edit(ParamSingleTeamRequest $request, $id)
    {
        // Edit an team
        $team = Team::find($request->id);

        if ($team) {
            return view('admin.outerpages.team')->with('page_data',$team->toArray());
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
    public function update(UpdateTeamRequest $request)
    {
        // Update edited team
        $team = Team::find($request->input('id'));

        if ($team) {
            $team->fill($request->toArray());
            $team->user_id = $request->user()->id;

            if ($team->save()) {
                // Clear cache
                Cache::forget('const');
                $request->session()->now('success', 'Task was successful!');

                // Return all team items
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
    public function destroy(SingleTeamRequest $request)
    {
        // Delete an team
        $team = Team::find($request->input('id'));

        if ($team) {
            if ($team->delete()) {
                // Clear cache
                Cache::forget('const');
                $request->session()->now('success', 'Task was successful!');

                // Return all team items
                return $this->show();
            }
        }

        $request->session()->flash('error', 'Task was not successful!');
        return back();
    }
}
