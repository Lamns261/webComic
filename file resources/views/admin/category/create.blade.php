@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Thêm danh mục bài viết') }}</div>

        <div class="card-body">
          <form action="{{ route('admin.Category.store')}}" method="post">
            @csrf

            <div class="form-group mb-3">
              <label for="name">Tiêu Đề</label>
              <input type="text" class="form-control" name="name" placeholder="Thêm tiêu đề">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <!-- <div class="form-group mb-3">
              <label for="cat_slug">Slug</label>
              <input type="text" class="form-control" name="cat_slug">
              @error('cat_slug')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div> -->
            <a href="{{ route('admin.Category.index') }}" class="btn btn-primary">Trở lại</a>
            <button type="submit" class="btn btn-primary">Thêm</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
