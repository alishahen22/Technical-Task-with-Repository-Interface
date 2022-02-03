<?php
namespace App\Repositories;

use App\interfaces\repositoryInterface;
use App\Models\Post;



class PostRepository implements repositoryInterface
{
        //get all post
    public function index() {

        return Post::all();

    }


        //store post
    public function store($data) {

        Post::create($data);

    }

        //get post by id
    public function getElementById($id) {

        $Post= Post::findOrFail($id);
        return $Post;

    }

      // update post in database
    public function update($data, $id) {

        $Post= Post::findOrFail($id);
        $Post->update($data);

    }

     // delete post
    public function destroy($id) {

        $Post= Post::findOrFail($id)->delete();

    }
}
