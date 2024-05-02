@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Scrivi una nuova recensione
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>* {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('review.store', ['id' => $viewData['product']->getId()]) }}">
      @csrf
      <div class="row">
            <label class="col-lg-1 col-md-6 col-form-label">Title:</label>
            <div class="col-lg-11 col-md-6 col-sm-12">
              <input name="title" value="{{ old('title') }}" type="text" class="form-control">
            </div>
      </div>
      <br>
      <div class = "col-auto">
        <div class = "input-group col-auto">
            <div class = "input-group-text">Rating </div>
            <input type = "number" min = "1" max = "5" class = "form-comtrol quantity-input" name = "rating" value = "1">
        </div>
      </div>
      <br>
      <div class="form-group">
        <label for="description">Comment:</label>
        <textarea name="comment" id="comment" class="form-control" rows="5" required></textarea>
      </div>    
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection