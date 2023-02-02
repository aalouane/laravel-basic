@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">


    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-body">

            <h4 class="card-title">Add Blog Page</h4>
            <form action="{{ route('store.blog')}}" method="POST">
              @csrf
              {{-- Edit Name --}}
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="name" name="name">
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Blog Cateogry">
            </form>
          </div>

        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->

  </div>
</div>

@endsection