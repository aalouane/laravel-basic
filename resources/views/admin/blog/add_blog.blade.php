@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style type="text/css">
  .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #b70000;
    font-weight: 700px;
  }
</style>

<div class="page-content">
  <div class="container-fluid">


    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-body">

            <h4 class="card-title">Add Blog Page</h4>
            <form action="{{ route('store.portfolio')}}" method="POST" enctype="multipart/form-data">
              @csrf
              {{-- Edit Name --}}
              <div class="row mb-3">
                <label for="blog_category" class="col-sm-2 col-form-label">Blog Category</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="blog_category">
                    <option selected="">Open this select menu</option>
                    @foreach ($categories as $cat)
                      <option value="{{$cat->id}}">{{$cat->blogcategory_name}}</option>

                    @endforeach
                  </select>
                </div>
              </div>

              {{-- Edit title --}}
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="title" name="title">
                  @error('title')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit tags --}}
              <div class="row mb-3">
                <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="php,javascript" name="blog_tags" data-role="tagsinput">
                </div>
              </div>

              {{-- Edit Long Description --}}
              <div class="row mb-3">
                <label for="elem1" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea id="elm1" name="description"></textarea>
                </div>
              </div>

              {{-- Edit About Page Image --}}
              <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" id="image" name="image">
                </div>
              </div>

              {{-- Show Home Slide --}}
              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <img class="rounded avatar-lg " id="show_image" src="{{ asset('upload/no_image.jpg')}}"
                    alt="Card image cap">
                </div>
              </div>

              <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Portfolio Page">
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