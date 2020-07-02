<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Team;
use App\Models\Particular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Forget cache value --testing purpose only
        // Cache::forget('const');

        // Pull from cache constant data
        $const = Cache::rememberForever('const', function () {
            $product = product::all();
            $team = Team::all();
            $particular = Particular::all();

            return [
                'product' => $product->toArray(), 
                'team' => $team->toArray(), 
                'particular' => $particular->toArray(), 
            ];
        });

        // merge and return results
        return view('outerpages.welcome')->with('page_data',$const);
    }
}
