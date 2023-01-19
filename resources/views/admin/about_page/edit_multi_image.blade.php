@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Update Image</h4>
                        <form action="{{route('update.multi.image', $image->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Edit About Multi Image --}}
                            <div class="row mb-3">
                                <label for="multi_image" class="col-sm-2 col-form-label">Edit Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="multi_image" name="multi_image"
                                        value="">
                                </div>
                            </div>

                            {{-- Show Home Slide --}}
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg " id="show_about_image"
                                        src="{{asset($image->multi_image)}}" alt="Card image cap">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Image">
                        </form>
                    </div>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $("#multi_image").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#show_about_image").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection