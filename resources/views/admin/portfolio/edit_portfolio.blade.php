@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">


    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-body">

            <h4 class="card-title">Edit Portfolio Page</h4>
            <form action="{{ route('update.portfolio', ['portfolio'=>$portfolio->id])}}" method="POST" enctype="multipart/form-data">
              @csrf
              {{-- Edit Name --}}
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{$portfolio->portfolio_name}}" id="name" name="name">
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit title --}}
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{$portfolio->portfolio_title}}" id="title" name="title">
                  @error('title')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit Long Description --}}
              <div class="row mb-3">
                <label for="elem1" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea id="elm1" name="description">
                    {{$portfolio->portfolio_description}}
                  </textarea>
                </div>
              </div>

              {{-- Edit About Page Image --}}
              <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" id="image" name="image" value="{{$portfolio->portfolio_image}}">
                </div>
              </div>

              {{-- Show Home Slide --}}
              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <img class="rounded avatar-lg " id="show_image"
                    src="{{(!empty($portfolio->portfolio_image)) ? asset($portfolio->portfolio_image) : asset('upload/no_image.jpg')}}"
                    alt="Card image cap">
                </div>
              </div>

              <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio Page">
            </form>
          </div>

        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->

  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
        $("#image").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#show_image").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection