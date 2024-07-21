<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LinkController;

class DashboardController extends Controller
{
    public function get(Request $request)
    {
        $allLinks = (new LinkController())->getLinksfFromUser($request->user()->id);
        return view('dashboard', ['links' => $allLinks]);

    }

    public function newlink(Request $request){
        return view('newLink');
    }

    public function webStore(Request $request){
        $link = new LinkController();
        $link->store($request);
        return redirect()->route('dashboard')->with('success', 'Link created successfully!');
    }

}
