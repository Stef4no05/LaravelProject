@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card mb-4">
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>* {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('review.update', ['id' => $viewData['review']->getId()]) }}">
      @csrf
      @method('PUT')
      <div class="row">
            <label class="col-lg-1 col-md-6 col-form-label">Titolo:</label>
            <div class="col-lg-11 col-md-6 col-sm-12">
              <input name="title" value="{{$viewData['review']->getTitle()}}" type="text" class="form-control">
            </div>
      </div>
      <br>
      <div class = "col-auto">
        <label>Punteggio:</label><br>
        <input type="radio" id="rating1" name="rating" value="1" {{ $viewData['review']->getRating() == '1' ? 'checked' : '' }}>
        <label for="rating1">⭐</label><br>
        
        <input type="radio" id="rating2" name="rating" value="2" {{ $viewData['review']->getRating() == '2' ? 'checked' : '' }}>
        <label for="rating2">⭐⭐</label><br>
        
        <input type="radio" id="rating3" name="rating" value="3" {{ $viewData['review']->getRating() == '3' ? 'checked' : '' }}>
        <label for="rating3">⭐⭐⭐</label><br>
        
        <input type="radio" id="rating4" name="rating" value="4" {{ $viewData['review']->getRating() == '4' ? 'checked' : '' }}>
        <label for="rating4">⭐⭐⭐⭐</label><br>
        
        <input type="radio" id="rating5" name="rating" value="5" {{ $viewData['review']->getRating() == '5' ? 'checked' : '' }}>
        <label for="rating5">⭐⭐⭐⭐⭐</label><br> 
      </div>
      <br>
      <div class="form-group">
        <label for="description">Commento:</label>
        <textarea name="comment" id="comment" class="form-control" rows="5" required>{{$viewData['review']->getComment()}}</textarea>
      </div>    
      <br>
      <button type="submit" class="btn btn-primary">Salva modifiche</button>
    </form>
  </div>
</div>
@endsection