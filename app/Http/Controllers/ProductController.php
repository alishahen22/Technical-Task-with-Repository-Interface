<?php

namespace App\Http\Controllers;
use App\Http\Requests\validateProductRequest;
use App\interfaces\repositoryInterface;


class ProductController extends Controller
{
    protected $product;

    public function __construct(repositoryInterface $product)
    {
        $this->product = $product;
    }

         //get all product
    public function index()
    {
        $products = $this->product->index();

        return view('products.index',compact('products'));
    }



           //store new product in database
    public function store(validateProductRequest $request)
    {

        $this->product->store($request->all());
        return redirect()->route('products.index')
                        ->with('success','product created successfully.');

    }

           // show one product and it is rating
    public function show($id)
    {
        $product = $this->product->getElementById($id);
        return view('products.show',compact('product'));
    }


       // view to edit one product
    public function edit($id)
    {
        $product = $this->product->getElementById($id);
        return view('products.edit',compact('product'));
    }



    public function update(validateProductRequest $request, $id)
    {
       // return $request;
        $this->product->update($request->all(),$id);
        return redirect()->route('products.index')
        ->with('success','product updated successfully.');

    }


        //delete product
    public function destroy($id)
    {
        $product = $this->product->destroy($id);
        return redirect()->route('products.index')
        ->with('successDelete','product Deleted successfully.');
    }
}
