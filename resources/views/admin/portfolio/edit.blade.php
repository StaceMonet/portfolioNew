@extends('admin.layouts.admin')

@section('content')
{{-- 
<div class="main-panel">
    <div class="content-wrapper"> --}}
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Portfilio</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif
        {{-- <p class="card-description"> Basic form elements </p> --}}
        <form class="forms-sample" method="POST" action="{{ route('admin.portfolio.update', $portfolio->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="form-group">
          <p class="card-description"> Portfilio Details</p>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                  <input type="text" name="title" class="form-control" placeholder="Enter Project title" value="{{$portfolio->title}}" required/>
                </div>
              </div>
            </div>
            
            <div class="col-md-7">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Url</label>
                <div class="col-sm-9">
                  <input type="text" name="project_url" class="form-control" placeholder="enter project url" value="{{$portfolio->project_url}}" required/>
                </div>
              </div>
            </div>
              
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" class="form-control" rows="4" placeholder="Enter Description" required>{{ $portfolio->description }}</textarea>
                </div>
              </div>
            </div>
              
            <div class="form-group">
              <label>File upload</label>
              <input type="file" name="image" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                </span>
              </div>
            </div>
              <div class="col-md-5">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Category</label>
                  <div class="col-sm-9">
                    <select class="form-control text-black" id="selectCat" name="cat_id">
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $portfolio->category->name =="$category->name" ? 'selected' : '' }} >{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
{{-- </div>
</div> --}}

@endsection
