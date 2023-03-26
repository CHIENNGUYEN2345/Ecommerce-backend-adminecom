<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favourites;
use App\Models\ProductList;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function AddFavourite(Request $request){
        $product_code = $request->product_code;
        $email = $request->email;
        $productDetails = ProductList::where('product_code', $product_code)->get();
        $result =  Favourites::insert([
            'product_name' => $productDetails[0]['title'],
            'image' => $productDetails[0]['image'],
            'product_code' => $product_code,
            'email' => $email,
        ]);
        return $result;

    }//end
    public function FavouriteList(Request $request){
        $email = $request->email;
        $result = Favourites::where('email',$email)->get();
        return $result;
    }//ens
    public function FavouriteRemove(Request $request){
        $product_code = $request->product_code;
        $email = $request->email;
        $result = Favourites::where('product_code',$product_code)->where('email',$email)->delete();
        return $result;
    }
}
