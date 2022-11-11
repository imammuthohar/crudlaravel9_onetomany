<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



class CommentController extends Controller
{
    
    public function create()
    {
        return view('post.tambahcomment');
    }
    
    public function edit(Comment $comment)
    {
        return view('post.tambahcomment', compact('post'));
    }

    public function show(Comment $comment)
    {
        return view('post.tambahcomment', compact('post'));
    }

 
    public function store(Request $request)
    {
        //validate form
        // dd($request->all());
        $this->validate($request, [
            // 'title' =>'required|min:0',
            // 'content' =>'required|min:0',
            'comment' =>'required|min:0'
        ]);

        //create post
        
        $post = Comment::create([
            'post_id'=>$request->post_id,
            'comment' =>$request->comment   
        ]);
        
      
     

        // dd($request->all());
        //redirect to index
        // return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }


}
