@extends('cms.layout.mainlayout')
@section('content')
<div class="card" style="height: 610px;">

    <div class="container" style="margin: auto ">
        <h2>Enter your new edit </h2>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{ url('dashbord/store/update/'.$store->id)}}" method="POST" style="margin: auto ;"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input name="name" type="text" value="{{ $store->name }}" class="form-control"
                            placeholder="Enter Store name ">
                    </div>
                    @error('name')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="address" class="col-form-label"> Address</label>
                        <input name="address" type="text" value="{{ $store->address }}" class="form-control"
                            placeholder="Enter Store Address">
                    </div>
                    @error('address')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                    <div class=" custom-file mb-3">
                        <label class="form-label" for="customFile"> choose logo to your Store</label>
                        <input type="file" name="logo" class="form-control" id="customFile">
                        <br>
                        <img src="{{ $store->logo }}" alt="logo" width="70">
                    </div>
                    <br>
                    <br>

                    @error('logo')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                    <button type=" submit" class="btn btn-primary" id="save_id">Save</button>

                </form>
            </div>

        </div>

    </div>
</div>


@stop