@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Home Slide page</h4>
                        <form action="{{ route('profile.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Edit title --}}
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $homeslide->title }}" id="title"
                                        name="title">
                                </div>
                            </div>

                            {{-- Edit ShortTitle --}}
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $homeslide->short_title }}"
                                        id="short_title" name="short_title">
                                </div>
                            </div>

                            {{-- Edit Video url --}}
                            <div class="row mb-3">
                                <label for="video_url" class="col-sm-2 col-form-label">Video Url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $homeslide->video_url }}"
                                        id="video_url" name="video_url">
                                </div>
                            </div>

                            {{-- Edit Home Slide --}}
                            <div class="row mb-3">
                                <label for="home_slide" class="col-sm-2 col-form-label">Profile image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="home_slide" name="home_slide">
                                </div>
                            </div>

                            {{-- Show Home Slide --}}
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg " id="show_home_slide"
                                        src="{{(!empty($homeslide->home_slide)) ? asset('upload/slide_images/'.$homeslide->home_slide) : asset('upload/no_image.jpg')}}"
                                        alt="Card image cap">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update slide">
                        </form>
                    </div>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $("#home_slide").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#show_home_slide").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection