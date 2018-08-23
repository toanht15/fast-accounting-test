<?php

namespace App\Http\Controllers;

use App\Classes\ApiClient;
use App\File;
use App\Image;
use App\Result;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        $images = Image::leftjoin('results', 'results.image_id', '=', 'images.id')->get();


        return view()->make('home', [
            'files' => $files,
            'images' => $images
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


        $f = new File();
        $f->name = $file->getClientOriginalName();
        $f->url = $url;
        $f->save();

        return back()->with('success','You have successfully upload image.');
    }

    public function convertToImage($fileId)
    {
        $file = File::find($fileId);
        $apiClient = new ApiClient();

        try {
            $response = $apiClient->request('convert_to_jpg', $file->url);

            foreach ($response->data->image as $image) {
                $image = str_replace('data:image/jpg;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $imageName = str_random(10).'.'.'jpg';
                \File::put(public_path('images/' . $imageName), base64_decode($image));

                $img = new Image();
                $img->file_id = $fileId;
                $img->url = url('images/' . $imageName);

                $img->save();
            }

            return back()->with('success','Converted successfully');
        } catch (\Exception $exception) {
            return back()->with('error','Failed');
        }

    }
}
