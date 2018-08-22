<?php

namespace App\Http\Controllers;

use App\Classes\ApiClient;
use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();

        return view()->make('home', [
            'files' => $files
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'fileToUpload' => 'required|file',
        ]);

        $file = $request->file('fileToUpload');

        $fileName = $file->hashName();
        $file->move(public_path('files'), $fileName);
        $url = url('files/' . $fileName);

        $apiClient = new ApiClient();

        $response = $apiClient->convertPdf($url);

        dd($response);




        $f = new File();
        $f->name = $file->getClientOriginalName();
        $f->url = $url;
        $f->save();

        return back()
            ->with('success','You have successfully upload image.');
    }
}
