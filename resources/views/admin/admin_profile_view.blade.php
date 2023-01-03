@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <center style="margin-top: 20px">
                        <img class="rounded-circle avatar-xl " src="{{asset('backend/assets/images/small/img-5.jpg')}}"
                            alt="Card image cap">
                    </center>

                    @auth
                    <div class="card-body">
                        <h4 class="card-title">Name : {{$admindata->name}}</h4>
                        <hr>
                        <h4 class="card-title">Username : {{$admindata->username}}</h4>
                        <hr>
                        <h4 class="card-title">User Email : {{$admindata->email}}</h4>
                        <hr>
                        <a href="{{ route('profile.edit') }}" class="btn btn-info btn-rounded waves-effect waves-light"> Edit Profile</a>

                    </div>

                    @else
                    <script>
                        window.location = "/login";
                    </script>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</div>
@endsection