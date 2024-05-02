<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Input;


class ReviewController extends Controller
{
    public function create($id)
    {
        // Trova il prodotto associato all'ID
        $product = Product::findOrFail($id);

        $viewData = [];
        $viewData['title'] = 'Scrivi una recensione';
        $viewData['subtitle'] = 'Scrivi una recensione per il '.$product->getName();
        $viewData['product'] = $product;

        return view('review.create')->with("viewData", $viewData);
    }

    public function store(Request $request,$id){
    
        $request -> validate([
            "title" => "required|max:255",
            "rating" => "required",
            "comment" => "required",
        ]);
    

    $review = new Review();
    $product = Product::findOrFail($id);
    $user_id= Auth::user()->getId();
    
    $review->setTitle($request->input('title'));
    $review->setComment($request->input('comment'));
    $review->setRating($request->input('rating'));
    $review->setUserId($user_id);
    $review->setProductId($product->getId());

    $review->save();

    $viewData['title'] = 'Carrello - online store';
    $viewData['subtitle'] = 'Prodotti nel carrello';

    return redirect()->route('product.show', ['id' => $product->getId()]);


    }
}