@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit profile page</h4>

                        {{-- Edit Name --}}
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" vlue="{{ $editdata->name }}"
                                    id="name">
                            </div>
                        </div>

                        {{-- Edit Username --}}
                       <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" vlue="{{ $editdata->username }}" id="username">
                            </div>
                        </div>

                        {{-- Edit Email --}}
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" vlue="{{ $editdata->email }}" id="email">
                            </div>
                        </div>

                        {{-- Edit Profile Image  --}}
                        <div class="row mb-3">
                            <label for="image_profile" class="col-sm-2 col-form-label">Profile image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="image_profile">
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>
@endsection