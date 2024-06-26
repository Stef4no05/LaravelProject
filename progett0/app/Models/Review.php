<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    public function getId(){
        return $this->attributes["id"];
    }
    public function getComment(){
        return $this->attributes["comment"];
    }
    public function getRating(){
        return $this->attributes["rating"];
    }
    public function getCreatedAt(){
        return $this->attributes["created_at"];
    }
    public function getUpdatedAt(){
        return $this->attributes['updated_at'];
    }
    public function getTitle(){
        return $this->attributes["title"];
    }
   
    public function setId($id){
        $this->attributes["id"] = $id;
    }
    public function setComment($comment){
        $this->attributes["comment"] = $comment;
    }
    public function setRating($rating){
        $this->attributes["rating"] = $rating;
    }
    public function setCreatedAt($createdAt){
        $this->attributes["created_at"] = $createdAt;
    }
    public function setUpdatedAt($updateAt){
        $this->attributes["updated_at"] = $updateAt;
    }
    public function setTitle($id){
        $this->attributes["title"] = $id;
    }
    public function setUserId($userId){
        $this->attributes["user_id"] = $userId;
    }
    public function setProductId($userId){
        $this->attributes["product_id"] = $userId;
    }

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }
    public function getProduct(){
        return $this->product;
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function getUser(){
        return $this->user;
    }

    public function getNumberOfStars() {
        $rating = $this->getRating();
        $stars = null;

        for($i=0; $i<$rating; $i++) {
            $stars = $stars."⭐";
        }

        return $stars;
    }
    
}
