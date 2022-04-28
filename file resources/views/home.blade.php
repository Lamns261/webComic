@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Trang Admin') }}</div>

        <div class="card-body">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="#">Home</a>
                </li>

                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('admin.Category.index') }}">Quản lý danh mục</a>
                </li>

                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('admin.Comic.index') }}">Quản lý truyện</a>
                </li>

                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('admin.Chapter.index') }}">Quản lý Chapter</a>
                </li>

                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('admin.Author.index') }}">Quản lý tác giả</a>
                </li>

                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('admin.Rating') }}">Quản lý đánh giá</a>
                </li>

              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
