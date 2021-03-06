<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show($imageId)
    {
        $result = Result::where('image_id', '=', $imageId)->first();

        return view('result', ['result' => $result]);
    }
}
