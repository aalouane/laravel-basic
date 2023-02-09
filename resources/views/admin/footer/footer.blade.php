@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">


    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-body">

            <h4 class="card-title">Update Footer Page</h4>
            <form action="{{ route('update.footer', $footer->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              {{-- Edit Numero --}}
              <div class="row mb-3">
                <label for="numero" class="col-sm-2 col-form-label">Numero</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{$footer->numero}}" id="numero" name="numero">
                  @error('numero')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit Long Description --}}
              <div class="row mb-3">
                <label for="short_description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="short_description" cols="80">{{ $footer->short_description }} </textarea>
                </div>
              </div>

              {{-- Edit Country --}}
              <div class="row mb-3">
                <label for="country" class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{ $footer->country }}" id="country" name="country">
                  @error('country')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit adress --}}
              <div class="row mb-3">
                <label for="adress" class="col-sm-2 col-form-label">Adress</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{ $footer->adress }}" id="adress" name="adress">
                  @error('adress')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit email --}}
              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{ $footer->email }}" id="email" name="email">
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit face --}}
              <div class="row mb-3">
                <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{ $footer->facebook }}" id="facebook" name="facebook">
                  @error('facebook')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit Twitter --}}
              <div class="row mb-3">
                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{ $footer->twitter }}" id="twitter" name="twitter">
                  @error('twitter')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit behance --}}
              <div class="row mb-3">
                <label for="behance" class="col-sm-2 col-form-label">Behance</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{ $footer->behance }}" id="behance" name="behance">
                  @error('behance')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit linkedin --}}
              <div class="row mb-3">
                <label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{ $footer->linkedin }}" id="linkedin" name="linkedin">
                  @error('linkedin')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit insta --}}
              <div class="row mb-3">
                <label for="insta" class="col-sm-2 col-form-label">Insta</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{ $footer->insta }}" id="linkedin" name="insta">
                  @error('insta')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Edit copyright --}}
              <div class="row mb-3">
                <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" value="{{ $footer->copyright }}" id="copyright" name="copyright">
                  @error('copyright')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Footer Page">
            </form>
          </div>

        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->

  </div>
</div>


@endsection