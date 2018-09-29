<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;


class PostsController extends Controller
{
    public function home() {
        return view('vueApp');
        // return view('layouts.app');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Posts::orderBy('id', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
          'body' => 'required',
        ]);

        $create = Posts::create($request->all());

        // OR

        // $post = new Posts();
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->save();

        return response()->json(['status' => 'success','msg' => 'post created successfully']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Posts::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Posts::find($id);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Posts::find($id);
        if ($post->count()) {
            $post->update($request->all());
            return response()->json(['status' => 'success', 'msg' => 'Post updated successfully']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'error in updating post']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);

        if ($post->count()) {
            $post->delete();
            return response()->json(['status' => 'success', 'msg' => 'Post deleted successfully']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'error in updating post']);
        }
    }
}
