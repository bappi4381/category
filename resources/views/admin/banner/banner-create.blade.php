@extends('admin.nav')

@section('body')
<div class="card w-75">
    <div class="card-header">
      <h3>New Banner Add</h3>
    </div>
    <div class="card-body ">
      <p class="card-title-desc">{{Session::get('message')}}</p>
      <form action="{{route('banner_create')}}" method="POST" enctype="multipart/form-data">
       @csrf
          <div class="form-group">
              <label>Banner Name</label>
              <input type="text" class="form-control w-50" name="banner_title" placeholder="Banner Name">
          </div>
          <div class="form-group">
              <label>Discount info</label>
              <input type="text" class="form-control w-50"  name="discount_info" placeholder="Discount info">
          </div>
          <div class="form-group">
              <label for="formrow-password-input">Banner Image</label>
              <input type="file" name="image" class="form-control" id="formrow-password-input">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection