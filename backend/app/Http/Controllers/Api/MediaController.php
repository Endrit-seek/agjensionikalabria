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
        return MediaManager::process($request->file('media'));
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
        return MediaManager::revert($request->getContent());
    }

    /**
     * restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        //
    }
}
