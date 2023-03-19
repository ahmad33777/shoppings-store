@extends('cms.layout.mainlayout')
@section('content')

<div class="card" style="min-height: 700px;">
    <div class="container " style="margin-top:  60px;">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">All purchases</h5>
                <div class="card-body">
                    <table class="table  table-bordered table-hover" style="text-align:center ;">
                        <thead>

                            <tr>
                                <th scope="col">Product Name </th>
                                <th scope="col">Store Name</th>
                                <th scope="col">Purchasing price</th>
                                <th>The date of purchase</th>

                        </thead>

                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->product_name}}</td>
                                <td>{{$transaction->store_name}}</td>
                                <td>$ {{$transaction->purchasing_price}}</td>
                                <td> {{$transaction->created_at}}</td>
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