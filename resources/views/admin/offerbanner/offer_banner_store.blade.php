@extends('admin.nav')

@section('body')
<div class="card w-75">
    <div class="card-header">
      <h3>Add New Offer Banner</h3>
    </div>
    <div class="card-body ">
      <p class="card-title-desc">{{Session::get('message')}}</p>
      <form action="{{route('offer_banner_create')}}" method="POST" enctype="multipart/form-data">
       @csrf
          <div class="form-group">
              <label>Offer Banner Name</label>
              <input type="text" class="form-control w-50" name="offer_banner_title" placeholder="Offer Banner Name">
          </div>
          <div class="form-group">
              <label>Discount info</label>
              <input type="text" class="form-control w-50"  name="offer_info" placeholder="Discount info">
          </div>
          <div class="form-group">
              <label for="formrow-password-input">Offer Banner Image</label>
              <input type="file" name="offer_image" class="form-control" id="formrow-password-input">
          </div>
          <button type="submit" class="btn btn-primary">Add Offer Banner</button>
      </form>
    </div>
  </div>
@endsection