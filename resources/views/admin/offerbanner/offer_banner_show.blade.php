@extends('admin.nav')

@section('body')
<div class="card">
    <div class="card-body">

        <h3 class="card-title">Catagory List</h3>
        <p class="card-title-desc">{{Session::get('message')}}</p>
        
        <table  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Sl On</th>
                    <th>Offer Banner name</th>
                    <th>Discount info</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>


            <tbody>
                @foreach($offers as $offer)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$offer->offer_banner_title}}</td>
                    <td>{{$offer->offer_info}}</td>
                    <td><img src="{{asset('storage/Offer_banner/' .$offer->offer_image)}}" alt="" style="height: 50px; width: 50px;"></td>
                    <td>
                        <a href="{{route('offer_banner_edit',['id' => $offer->id])}}" class="btn btn-success">Edit</a>
                        <a href="{{route('offer_banner_delete',['id' => $offer->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection