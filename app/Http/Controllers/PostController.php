<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        //get all posts from Model
        $posts = Post::latest()->get();

        //passing posts to view
        return view('post.posts', compact('posts'));
        // return view('pos', compact('posts'));
        
    }

    public function create()
    {   
        return view('post.create');
        
    }

    // public function edit(Post $post)
    // {
    //     return view('post.tambahcomment', compact('post'));
    // }

    public function edit(Post $post)
    {
        return view('post.tambahcomment', compact('post'));
    }

    public function store(Request $request)
    {
        //validate form
       
        $this->validate($request, [
            
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //create post
        Post::create([
            
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
   
    public function destroy(Post $post)
    {
      
        // Storage::delete('public/siswas/'. $siswa->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function show(Post $post)
    {
        return view('post.tambahcomment', compact('post'));
    }
}
