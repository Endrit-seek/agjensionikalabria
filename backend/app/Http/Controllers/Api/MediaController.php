<?php

namespace App\Http\Controllers\Api;

use App\Facades\MediaManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function process(Request $request)
    {
        $tmp = uniqid() . "_" . now()->timestamp;
        
        return 'dd';

        foreach($request->allFiles() as $file) {
            MediaManager::process($file, $tmp);
        }

        return $tmp;
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
    public function revert(string $id)
    {
        //
    }

    /**
     * restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        //
    }
}
