<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\TemporaryMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function process(Request $request)
    {
        if(!$request->hasFile('media')) {
            return response()->json(['upload_file_not_found'], 400);
        }

        $allowedfileExtension=['pdf','jpg','png'];
        $files = $request->file('media'); 
        $ids = [];

        if(is_array($files)) {
            foreach ($files as $file) {      
                $extension = $file->getClientOriginalExtension();
         
                $check = in_array($extension,$allowedfileExtension);
                if($check) {
                    $folder = uniqid('img-', true);
                    $ids[] = $folder;
                    foreach($request->media as $mediaFiles) {
                        $fileName = $mediaFiles->getClientOriginalName();
                        $path = $mediaFiles->storeAs('public/images/tmp/'. $folder, $fileName);
              
                        //store image file into directory and db
                        TemporaryMedia::create([
                            'directory' => $folder,
                            'name' => $fileName
                        ]);
                    }
                } else {
                    return response()->json(['invalid_file_format'], 422);
                }
            }
            return $ids;
        } else {
            $extension = $files->getClientOriginalExtension();
         
            $check = in_array($extension,$allowedfileExtension);
            if($check) {
                $folder = uniqid('img-', true);
                $ids[] = $folder;
                $fileName = $request->media->getClientOriginalName();
                $path = $request->media->storeAs('public/images/tmp/'. $folder, $fileName);
        
                //store image file into directory and db
                TemporaryMedia::create([
                    'directory' => $folder,
                    'name' => $fileName
                ]);
            } else {
                return response()->json(['invalid_file_format'], 422);
            }

            return $ids;
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function load(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function fetch(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function patch(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function revert(Request $request)
    {
        if (File::isDirectory(public_path('storage/images/tmp/' . $request->all()[0]))) {
            Storage::deleteDirectory('/public/images/tmp/' . $request->all()[0]);
            File::deleteDirectory(public_path('storage/images/tmp/' . $request->all()[0]));
        }

        return response()->noContent();
        // return MediaManager::revert($request->getContent());
    }

    /**
     * restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        //
    }
}
