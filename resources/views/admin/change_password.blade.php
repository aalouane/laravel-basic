@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Change Password Page</h4><br> </br>

                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                            @endforeach
                        @endif
                        <form action="{{ route('update.password')}}" method="POST">
                            @csrf
                            {{-- old Password --}}
                            <div class="row mb-3">
                                <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" value="" id="oldpassword"
                                        name="oldpassword">
                                    @error('oldpassword')
                                    <p class="text-red-500 text-xs mt-1"> Please enter your password </p>
                                    @enderror
                                </div>
                            </div>

                            {{-- old Password --}}
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" value="" id="password" name="password">
                                    {{-- @error('password')
                                    <p class="text-red-500 text-xs mt-1"> Please enter a valid name </p>
                                    @enderror --}}
                                </div>
                            </div>

                            {{-- old Password --}}
                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" value="" id="password_confirmation" name="password_confirmation">
                                    {{-- @error('password_confiramtion')
                                    <p class="text-red-500 text-xs mt-1"> Please enter a valid name </p>
                                    @enderror --}}
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                        </form>
                    </div>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>

@endsection