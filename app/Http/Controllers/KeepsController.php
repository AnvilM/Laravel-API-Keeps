<?php

namespace App\Http\Controllers;

use App\Models\Keep;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeepsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Keep = new Keep();

        $Keeps = $Keep::orderBy('time', 'DESC')->get();

        return response()->json($Keeps);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "header" => "string",
            "body" => "required|string"
        ]);

        $header = $request->post("header");
        $body = $request->post("body");

        $Keep = new Keep();

        $Keep->header = $header;
        $Keep->body = $body;
        $Keep->time = Carbon::now()->timestamp;
        $Keep->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Keep = new Keep();

        $Keep = $Keep::where('id', $id)->first();

        return response()->json($Keep);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $header = $request->post("header");
        $body = $request->post("body");

        $Keep = new Keep();

        $Keep::where('id', $id)->update(['header' => $header, "body" => $body, "time" => Carbon::now()->toDateTimeString()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $Keep = new Keep();

        $Keep = $Keep::where('id', $id)->delete();

        return response($Keep ? true : false);
    }
}
