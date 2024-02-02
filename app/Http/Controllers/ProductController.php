<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products=[
        //     [
        //         "id"          => 1,
        //         "name"        => "ddjjd",
        //         "description" => "uddjdjdjdjdjjdjjjdjd",
        //         "image"       => "djdjd",
        //     ],
        //     [
        //         "id"          => 2,
        //         "name"        => "ddjjd",
        //         "description" => "uddjdjdjdjdjjdjjjdjd",
        //         "image"       => "djdjd",
        //     ],
        // ];
        $products=Product::all();
        // Product::latest()->get();
        return view("product.index",compact("products"));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $formField=$request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);
        if($request->hasFile('image')){
           $formField['image']=$request->file('image')->store('images','public');
        }else{
            $formField['image']=null;
        }

        Product::create([
            'name' =>$formField['name'] ,
            'description' => $formField['description'],
            'image' => $formField['image'],
        ]);

        return redirect('/')->with('message','Product Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("product.edit",compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $formField=$request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);
        if($request->hasFile('image')){
            if($product->image){
                Storage::disk("public")->delete($product->image);
            }
            $formField['image']=$request->file('image')->store("images","public");
        }else{
            $formField['image']=$product->image;
        }
        $product->update([
            'name'=>$formField['name'],
            'description'=>$formField['description'],
            'image'=>$formField['image'],
        ]);
        return redirect()->route('product.index')->with('message',"updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {   
        Storage::disk("public")->delete($product->image);
        $product->delete();
        return redirect()->route('product.index')->with('message',"deleted successfully");
    }
}
