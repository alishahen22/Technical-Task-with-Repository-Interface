<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\validateRatingRequest;

class RatingController extends Controller
{
    // view page to add rating to product

    public function viewRatingProduct($id)
    {

        return view('products.rating' , compact('id'));
    }

    //save the rating to product in database

    public function storeRatingProduct(validateRatingRequest $request , $id)
    {
        $Product = new Rating();
        $Product->ratingable_id = $id ;
        $Product->ratingable_type = 'App\Models\Product' ;
        $Product->score = $request->rate ;
        $Product->desctiption = $request->description ;
        $Product->save();
        return redirect()->route('products.index');
    }

         // view page to add rating to post
    public function viewRatingpost($id)
    {
        return view('posts.rating' , compact('id'));
    }


        //save the rating to post in database

    public function storeRatingpost(validateRatingRequest $request , $id)
    {
        $Product = new Rating();
        $Product->ratingable_id = $id ;
        $Product->ratingable_type = 'App\Models\post' ;
        $Product->score = $request->rate ;
        $Product->desctiption = $request->description ;
        $Product->save();
        return redirect()->route('posts.index');
    }
}
