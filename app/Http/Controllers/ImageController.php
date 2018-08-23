<?php

namespace App\Http\Controllers;

use App\Classes\ApiClient;
use App\Image;
use App\Result;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function getOrc($imageId)
    {
        $image = Image::find($imageId);
        $apiClient = new ApiClient();

        try {
            $response = $apiClient->request('receipt', $image->url);

            $result = new Result();
            $result->image_id = $imageId;
            $result->note = $response->note;
            $result->date = $response->date;
            $result->amount = $response->amount;
            $result->tel = $response->tel;
            $result->save();

            return redirect()->route('view_result', ['imageId' => $imageId]);
        } catch (\Exception $exception) {
            return back()->with('error','Failed');
        }

    }
}
