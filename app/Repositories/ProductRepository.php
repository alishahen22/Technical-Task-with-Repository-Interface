<?php
namespace App\Repositories;

use App\interfaces\repositoryInterface;
use App\Models\Product;



class ProductRepository implements repositoryInterface
{

        //get all post
    public function index() {

        return Product::all();
   }

        //store post
    public function store($data) {

        Product::create($data);
    }


         //get post by id
    public function getElementById($id){
         $Product= Product::findOrFail($id);
        return $Product;
    }


         // update post in database
    public function update($data, $id) {
        $Product= Product::findOrFail($id);
        $Product->update($data);
    }

         // delete post
    public function destroy($id){
        $Product= Product::findOrFail($id)->delete();
    }

}
