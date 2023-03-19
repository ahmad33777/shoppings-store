@extends('cms.layout.mainlayout')
@section('content')
<div class="card" style="min-height: 700px;">
    <div class="container " style="margin-top:  60px;">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">All Products</h5>
                <div class="card-body">
                    <table class="table  table-bordered table-hover" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope=" col"> Name </th>
                                <th scope="col">Description</th>
                                <th scope="col">price</th>
                                <th scope="col">Store</th>
                                <th scope="col">Discount </th>
                                <th scope="col">Image</th>
                                <th scope="col">Create Time</th>
                                <th scope="col">Update Time</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                        </thead>
                        <tbody>
                            @foreach($prodects as $prodect)
                            <tr>
                                <td>{{ $prodect->name ?? null  }} </td>
                                <td> {{ $prodect->description ?? null }}</td>
                                <td> ${{ $prodect->base_price ?? null}} </td>
                                <td>{{$prodect->store->name ?? null }}</td>
                                <td>%{{$prodect->discount_price ?? null}}</td>

                                <td><img src="{{ $prodect->image}}" alt="image" width="50"></td>

                                <td>{{$prodect->created_at }}</td>
                                <td>{{$prodect->updated_at }}</td>

                                <th>
                                    <a href="{{ url('dashbord/product/edit/'.$prodect->id)}}" class="btn btn-primary">Edit
                                <th>
                                    <form action=" {{ url('dashbord/product/destroy/'.$prodect->id) }}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </td>
                            </tr>
                            @endforeach



                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>

</div>
@stop