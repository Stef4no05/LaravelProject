@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle',$viewData['subtitle'])
@section('content')

@foreach($viewData["reviews"] as $review)
<br>
<div class = "card">
    <div class="card-header">
        <a href= {{route('product.show', ['id' => $review->getProduct()->getId()])}} style="color: #9457EB"> {{$review->getProduct()->getName()}} </a>
        <p class="card-text" style="text-align:left"><small class="text-muted"> {{$review->getNumberOfStars()}}</small> <b><small class="text-muted"> {{$review->getTitle()}}</small></b>
    </div>
            
    <div class="card-body">
        <p class="card-text" style="text-align:left"><small class="text-muted"> {{$review->getComment()}}</small></p> 
        <p class="card-text" style="text-align:left"><small class="text-muted"><b>Ultima modifica: </b>{{$review->getUpdatedAt()}}</small></p>
        <div class="row justify-content-end">
            <div class = "col-auto">
                <form method = "GET" action="{{route('review.edit', ['id' => $review->getId()]) }}">
                    @csrf
                    <button class = "btn bg-secondary text-white" type = "submit">Modifica</button>
                </form>
            </div>

            <div class = "col-auto">
                <form method = "POST" action="{{route('review.delete', ['id' => $review->getId()]) }}">
                    @csrf
                    @method('DELETE')
                    <button class = "btn bg-danger text-white" type = "submit">Elimina</button>
                </form>
            </div>
        </div>
    </div> 
</div>  
@endforeach

@endsection