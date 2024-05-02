@extends('layouts.app')
@section('title', 'Scrivi una nuova recensione')
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

    <form method="POST" action="{{ route('review.store', ['id' => $product->getId()]) }}">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Title:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="title" value="{{ old('title') }}" type="text" class="form-control">
            </div>
          </div>
        </div> 
      </div>
      <div class = "col-auto">
        <div class = "input-group col-auto">
            <div class = "input-group-text">Rating </div>
            <input type = "number" min = "1" max = "5" class = "form-comtrol quantity-input" name = "rating" value = "1">
        </div>
    </div>
      <div class="form-group">
        <label for="description">Comment:</label>
        <textarea name="comment" id="comment" class="form-control" rows="5" required></textarea>
      </div>    
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection