@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">About Page</h4>
                        <form action="{{ route('update.about', $aboutpage->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- Edit title --}}
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $aboutpage->title }}" id="title"
                                        name="title">
                                </div>
                            </div>

                            {{-- Edit ShortTitle --}}
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $aboutpage->short_title }}"
                                        id="short_title" name="short_title">
                                </div>
                            </div>

                            {{-- Edit Short Description --}}
                            <div class="row mb-3">
                                <label for="short_description" class="col-sm-2 col-form-label">Short description</label>
                                <div class="col-sm-10">
                                    <textarea id="short_description" name="short_description" class="form-control" rows="3">
                                        {{$aboutpage->short_description}}
                                    </textarea>
                                </div>
                            </div>

                            {{-- Edit Long Description --}}
                            <div class="row mb-3">
                                <label for="elem1" class="col-sm-2 col-form-label">Long description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description" >
                                        {{$aboutpage->long_description}}
                                    </textarea>
                                </div>
                            </div>

                            {{-- Edit About Page Image --}}
                            <div class="row mb-3">
                                <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="about_image" name="about_image">
                                </div>
                            </div>

                            {{-- Show Home Slide --}}
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg " id="show_about_image"
                                        src="{{(!empty($aboutpage->about_image)) ? asset($aboutpage->about_image) : asset('upload/no_image.jpg')}}"
                                        alt="Card image cap">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update About Page">
                        </form>
                    </div>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $("#about_image").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#show_about_image").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection