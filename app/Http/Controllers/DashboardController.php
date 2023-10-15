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

}
