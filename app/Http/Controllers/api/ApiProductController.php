<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\interfaces\repositoryInterface;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
        use GeneralTrait;
        protected $product;

        public function __construct(repositoryInterface $product)
        {
            $this->product = $product;
        }

             //get all product
        public function index()
        {

            $products = $this->product->index();

            if ($products){
                return $this->returnData('products' , $products, 'this is all posts' , 200);
            } else{
                return $this->returnError(404 , 'not posts in database');
            }
        }

                //store new product in database
        public function store(Request $request)
        {
                //validation
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'Description' => 'required',
            'Price'=>'numeric|required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

                //store product
            $this->product->store($request->all());

                return $this->returnSuccessMessage(200 , 'product added successfally');


        }

            // show one product and it is rating
        public function show($id)
        {
            $product = $this->product->getElementById($id);
            if (is_null($product)) {
                return response()->json('Data not found', 404);
            }
            return $this->returnData('product' , $product, 'this is the post' , 200);
        }


                //update data
        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(),[
                'title' => 'required|string|max:255',
                'Description' => 'required',
                'Price'=>'numeric|required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());
            }

            $this->product->update($request->all(),$id);
          return $this->returnSuccessMessage(200 , 'product updated successfally');


        }


            //delete product
        public function destroy($id)
        {
            $product = $this->product->destroy($id);
            return $this->returnSuccessMessage(200 , 'product deleted successfally');

        }

}
