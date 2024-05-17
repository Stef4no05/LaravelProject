<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Input;


class ReviewController extends Controller
{
    
    public function index() {
        $viewData = [];
        $user_id = Auth::user()->getId();

        $viewData['title'] = "Le tue recensioni";
        $viewData['subtitle'] = "Le tue recensioni";
        $viewData ['reviews'] = Review::where('user_id', $user_id)->orderBy('updated_at', 'desc')->get();
        
        return view('review.index')->with('viewData', $viewData);
    }
    
    public function create($id)
    {
        // Trova il prodotto associato all'ID
        $product = Product::findOrFail($id);

        $viewData = [];
        $viewData['title'] = 'Scrivi una recensione';
        $viewData['subtitle'] = 'Scrivi una recensione per '.$product->getName();
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

        return redirect()->route('product.show', ['id' => $product->getId()]);
    }

    public function delete($id){
        Review::destroy($id);
        return back();
    }

    //funzione per leggere la recensione che si vuole modificare
    public function edit($id){
        $review = Review::findOrFail($id);
        $viewData = [];
        $viewData['title'] = 'Modifica recensione';
        $viewData['subtitle'] = 'Modifica la tua recensione';
        $viewData['review'] = $review;

        return view('review.edit')->with("viewData" , $viewData);
    }

    public function update(Request $request, $id){
        $request -> validate([
            "title" => "required|max:255",
            "rating" => "required",
            "comment" => "required",
        ]);
    
        $review = Review::findOrFail($id);
        
        $review->setTitle($request->input('title'));
        $review->setComment($request->input('comment'));
        $review->setRating($request->input('rating'));
        $review->save();

        return redirect()->route('review.index');
    }
}