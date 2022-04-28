@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Quản lý danh mục bài viết') }}</div>

        <div class="card-body">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('admin.Category.create') }}">Thêm danh mục</a>
                </li>
              </ul>
            </div>
          </nav>

          @if (session('status'))
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('status') }}
          </div>
          @endif

          <table class="table align-middle">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $key => $category)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td style="min-width: 350px;">{{ $category->name }}</td>

                <td>
                  <a href="{{ route('admin.Category.edit', ['category'=>$category->id]) }}" class='btn btn-warning m-1'>Sửa</a>
                  <form action="{{ route('admin.Category.destroy', ['category'=>$category->id]) }}" method="post" class="d-inline-block">
                    @method('delete')
                    @csrf
                    <button class='btn btn-danger m-1' type='submit'>Xóa</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
