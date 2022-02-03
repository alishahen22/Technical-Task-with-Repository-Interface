<?php

namespace App\Http\Controllers;

use App\Http\Requests\validatePostRequest;
use App\interfaces\repositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post;

    public function __construct(repositoryInterface $post)
    {
        $this->post = $post;
    }

   //get all posts
    public function index()
    {
        $posts = $this->post->index();

        return view('posts.index',compact('posts'));
    }



        //store new post in database
    public function store(validatePostRequest $request)
    {


        $this->post->store($request->all());
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');

    }

            // show one post and it is rating
    public function show($id)
    {
        $post = $this->post->getElementById($id);
        return view('posts.show',compact('post'));
    }


      // view to edit one post
    public function edit($id)
    {
        $post = $this->post->getElementById($id);
       return view('posts.edit',compact('post'));
    }


       // save edit
    public function update(validatePostRequest $request, $id)
    {
       // return $request;
        $this->post->update($request->all(),$id);
        return redirect()->route('posts.index')
        ->with('success','Post updated successfully.');

    }

        //delete post
    public function destroy($id)
    {
        $post = $this->post->destroy($id);
        return redirect()->route('posts.index')
        ->with('successDelete','Post Deleted successfully.');
    }
}
