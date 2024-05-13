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
        <div class = "input-group col-auto">
            <div class = "input-group-text">Punteggio </div>
            <input type = "number" min = "1" max = "5" class = "form-comtrol quantity-input" name = "rating" value = "{{$viewData['review']->getRating()}}">
        </div>
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