<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Link;

class LinkController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'long_url' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors(), 'timestamp' => time()], 400);
        }

        $link = new Link();

        $link->ownerId = $request->user()->id;
        $link->long_url = $request->long_url;

        $link->save();

        return response()->json(['success' => true, 'message' => 'Link created successfully', 'timestamp' => time()], 200);

    }
}
