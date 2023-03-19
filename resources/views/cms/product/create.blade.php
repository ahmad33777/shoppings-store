@extends('cms.layout.mainlayout')
@section('content')
<div class="card" style=" padding: 50px;">

    <div class="container" style="margin: auto ">
        @if(session()->has('add_states'))
        @if(session('add_states'))
        <div class="alert  alert-success"> Added suc cessfully </div>
        @else
        <div class="alert  alert-danger">add failed</div>

        @endif
        @endif
        <br>
        <br>
        <h1>Add New Product</h1>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{ url('dashbord/product/store') }}" method="post" enctype="multipart/form-data"
                    style="margin: auto ;">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Product Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter product name "
                            value="{{ old('name')}}">
                    </div>
                    @error('name')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="description" class="col-form-label"> Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="7"
                            placeholder="Enter Store Address">{{old('description')}}</textarea>

                    </div>
                    @error('description')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="base_price" class="col-form-label">Base price</label>
                        <input name="base_price" type="text" class="form-control" placeholder="Enter Base price "
                            value="{{ old('base_price') }}">
                    </div>
                    @error('base_price')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="store_id" class="col-form-label">Store Name </label>
                        <select name="store_id" id="store_id" class="form-control">
                            <option value="-1"></option>
                            @foreach($stores as $store)
                            <option value="{{ $store->id}}" class="form-control">{{$store->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('store_id')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="discount_price" class="col-form-label">Discount price</label>
                        <input name="discount_price" type="text" class="form-control"
                            placeholder=" Enter Discount Price " value="0">
                    </div>
                    @error('discount_price')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class=" custom-file mb-3">
                        <label class="form-label" for="customFile"> choose Image for Product</label>
                        <input type="file" name="image" class="form-control" id="customFile" value="{{ old('image') }}">
                    </div>
                    <br>
                    <br>
                    @error('image')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                    <br>
                    <br>
                    <button type=" submit" class="btn btn-primary">Save</button>
                </form>
            </div>

        </div>

    </div>
</div>




@stop