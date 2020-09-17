<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use App\category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function singlePost($id,$id2)
    {
        $category=category::withCount('posts')->get();
        $posts=post::with('user')->limit(5)->get();
        $blog=post::with('user')->where('id',$id)->first();

        foreach ($posts as $value) {
            $tagg[]=$value->tag;
        }
   
        $tag = json_decode(json_encode(array_unique(explode(",",implode(",",$tagg)))));

        return view('frontend.single-post',compact('blog','posts','category','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allPost()
    {
        $category=category::withCount('posts')->get();
        $posts=post::with('user')->paginate(20);
        $latestposts=post::with('user')->get();
        foreach ($latestposts as $value) {
            $tagg[]=$value->tag;
        }
   
        $tag = json_decode(json_encode(array_unique(explode(",",implode(",",$tagg)))));

        return view('frontend.all-posts',compact('posts','latestposts','category','tag'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}
