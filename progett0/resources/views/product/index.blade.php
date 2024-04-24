@extends('layouts.app')
@section('title',$viewData['title'])
@section('subtitle',$viewData['subtitle'])
@section('content')

<div class="row">
    @foreach($viewData['products'] as $product)
    <div class = "col-md-4 mb-2">
        <div class = "card">
            <img src = "{{asset('/storage/'.$product->getImage()) }}" class = "card-img-top img-card">
            <div class = "card-body text-center">
                <p class="text-start"><b> Numero di recensioni </b> - {{$product->reviews()->count();}}</p>
                <p class="text-start"><b> Punteggio medio </b> - {{(int)$product->reviews()->avg('rating')}}/5⭐</p>
                <a href = "{{route('product.show',['id'=>$product["id"]])}}"
                class = "btn bg-secondary text-white">{{$product->getName()}}</a>
            </div>
        </div>    
    </div>
    @endforeach
</div>
@endsection