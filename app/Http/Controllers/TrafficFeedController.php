<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use Carbon\Carbon;

class TrafficFeedController extends Controller
{
    public function index()
    {
    	$stories = Story::all();

    	return view('pages.traffic-feed', compact('stories'));
    }

    public function post()
    {
    	$photo = request('photo');
    	$filename = auth()->user()->id.'-'.Carbon::now().'.'.$photo->getClientOriginalExtension();
    	$photo->move(base_path().'/public/image/traffic-feed/', $filename);

    	$story = new Story;
    	$story->photo = $filename;
    	$story->caption = request('caption');
    	$story->user_id = auth()->user()->id;
    	$story->save();

    	return redirect('/traffic-feed');
    }
}
