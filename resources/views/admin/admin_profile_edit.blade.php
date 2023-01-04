@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Edit profile page</h4>
                        <form action="{{ route('profile.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Edit Name --}}
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editdata->name }}" id="name" name="name">
                                </div>
                            </div>

                            {{-- Edit Username --}}
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editdata->username }}"
                                        id="username" name="username">
                                </div>
                            </div>

                            {{-- Edit Email --}}
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editdata->email }}" id="email"  name="email">
                                </div>
                            </div>

                            {{-- Edit Profile Image --}}
                            <div class="row mb-3">
                                <label for="image_profile" class="col-sm-2 col-form-label">Profile image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image_profile" name="image_profile">
                                </div>
                            </div>

                            {{-- Show Profile Image --}}
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg " id="show_image_profile"
                                        src="{{asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit profile">
                        </form>
                    </div>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $("#image_profile").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#show_image_profile").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection