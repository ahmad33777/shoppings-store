@extends('cms.layout.mainlayout')
@section('content')
<div class="card" style="min-height: 700px;">
    <div class="container " style="margin-top:  60px;">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">All Stores</h5>
                <div class="card-body">
                    <table class="table  table-bordered table-hover" style="text-align:center ;">
                        <thead>
                            <tr>
                                <th scope="col">Store Name </th>
                                <th scope="col">Address</th>
                                <th scope="col">Logo</th>
                                <th>Create Time</th>
                                <th>Update Time</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                        </thead>
                        <tbody>

                            @foreach($stores as $store)
                            <tr>
                                <td>{{ $store->name}}</td>
                                <td>{{ $store->address}}</td>
                                <td><img src="{{ $store->logo }}" alt="logo" width="50"></td>
                                <td>{{ $store->created_at}}</td>
                                <td>{{ $store->updated_at}}</td>
                                <td><a href="{{ url( 'dashbord/store/edit/'.$store->id ) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url( 'dashbord/store/destroy/'.$store->id )  }}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button id="delete_id" class="btn btn-danger">Delete</button>
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <!-- <script type="text/javascript">
    $('#delete_id').click(function(e) {
        e.preventDefault();
        var confarmValue = confirm('Are youe sure');
        if (confarmValue) {
            $('#form_submit_id').submit();
        }
    });
    </script> -->
</div>

@stop