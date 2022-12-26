<?php

namespace App\Http\Controllers;

use App\Models\ApiPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = ApiPost::get();
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'location' => 'required|string',
            'employment' => 'required|string',
            'shortDesc' => 'required|string',
            'longDesc' => 'required|string',
            'role' => 'required|string',
            'benefits' => 'required|string',
        ]);

        $post = ApiPost::create([
            'title' => $request->title,
            'location' => $request->location,
            'employment' => $request->employment,
            'shortDesc' => $request->shortDesc,
            'longDesc' => $request->longDesc,
            'role' => $request->role,
            'benefits' => $request->benefits,
        ]);

        if ($post) {
            $success = "Post created successfully";
            return response()->json($success);
        } else {
            $failed = "Failed";
            return response()->json($failed);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'location' => 'required|string',
            'employment' => 'required|string',
            'shortDesc' => 'required|string',
            'longDesc' => 'required|string',
            'role' => 'required|string',
            'benefits' => 'required|string',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $post = ApiPost::findOrFail($id)->update([
            'title' => $request->title,
            'location' => $request->location,
            'employment' => $request->employment,
            'shortDesc' => $request->shortDesc,
            'longDesc' => $request->longDesc,
            'role' => $request->role,
            'benefits' => $request->benefits,
        ]);
        if ($post) {
            $success = "Post updated successfully";
            return response()->json($success);
        } else {
            $failed = "Failed";
            return response()->json($failed);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApiPost  $apiPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = ApiPost::findOrFail($id);
        return response()->json($posts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApiPost  $apiPost
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $posts = ApiPost::findOrFail($id);
        $posts->delete();
        $success = "post deleted successfully";
        return response()->json($success);
    }
}
