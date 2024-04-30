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
    public function getUpdateAt(){
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
    public function setUpdateAt($updateAt){
        $this->attributes["updateAt"] = $updateAt;
    }
    public function setTitle($id){
        $this->attributes["title"] = $id;
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
}
