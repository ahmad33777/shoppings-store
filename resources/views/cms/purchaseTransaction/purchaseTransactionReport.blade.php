@extends('cms.layout.mainlayout')
@section('content')

<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 80px; min-height: 550px;">
    <div class="card">
        <div class="card-header p-4">

            <h3>PURCHASES REPORT</h3>
            <div class="float-right">
                Time and Date : {{ $currentTime->toDateTimeString();}}
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name </th>
                            <th class="right">Total Purchases</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td class="center">{{$transaction->product_name}}</td>
                            <td class="center"> $ {{$transaction->purchasing_price}} </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>

@stop