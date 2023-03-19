@extends('cms.layout.mainlayout')
@section('content')
<div class="card" style="height: 610px;">



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
        <h1>Add New Store</h1>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{ URL('dashbord/store/store') }}" method="POST" style="margin: auto ;"
                    enctype="multipart/form-data" id="form_submit_id">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input name="name" type="text" value="{{old('name')}}" class="form-control"
                            placeholder="Enter Store name ">
                    </div>
                    @error('name')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="address" class="col-form-label"> Address</label>
                        <input name="address" type="text" value="{{old('address') }}" class="form-control"
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
                        <input type="file" name="logo" value="{{old('logo') }}" class="form-control" id="customFile">
                    </div>
                    <br>
                    <br>

                    @error('logo')
                    <div class="alert  alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <button type="submit" id="save_id" class="btn btn-primary">Save</button>
                    <br>
                </form>
            </div>

        </div>

    </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script type="text/javascript">
$('#save_id').click(function(e) {
    e.preventDefault();
    var confarmValue = confirm('Are youe sure');
    if (confarmValue) {
        $('#form_submit_id').submit();
    }
});
</script> -->
@stop