<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\interfaces\repositoryInterface;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use GeneralTrait;
    protected $post;

    public function __construct(repositoryInterface $post)
    {
        $this->post = $post;
    }

         //get all post
    public function index()
    {

        $posts = $this->post->index();

        if ($posts){
            return $this->returnData('posts' , $posts, 'this is all posts' , 200);
        } else{
            return $this->returnError(404 , 'not posts in database');
        }

    }

            //store new post in database
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'contact' => 'required',
            'user_id'=>'numeric|required'
        ]);

    if($validator->fails()){
        return response()->json($validator->errors());

    }

        $this->post->store($request->all());

            return $this->returnSuccessMessage(200 , 'post updated successfally');

    }

        // show one post and it is rating
    public function show($id)
    {
        $post = $this->post->getElementById($id);
        if (is_null($post)) {
            return response()->json('Data not found', 404);
        }
        return $this->returnData('post' , $post, 'this is all posts' , 200);
    }




        //update post in database
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'contact' => 'required',
            'user_id'=>'numeric|required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $this->post->update($request->all(),$id);
      return $this->returnSuccessMessage(200 , 'post updated successfally');


    }


        //delete post
    public function destroy($id)
    {
        $post = $this->post->destroy($id);
        return $this->returnSuccessMessage(200 , 'post deleted successfally');

    }

}
