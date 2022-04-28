@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Quản lý Chapter') }}</div>

        <div class="card-body">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('admin.Chapter.index') }}">Quay lại</a>
                </li>

                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('createChapterOfComic', ['comic'=>$comic->id]) }}">Thêm Chapter</a>
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
                <th scope="col" style="width:60%">Tên Chapter</th>
                <th scope="col">Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($chapters as $chapter)
              <tr>
                <td>{{ $chapter->name }}</td>

                <td>
                  <a href="{{ route('admin.Chapter.edit', ['chapter'=>$chapter->id]) }}" class='btn btn-warning m-1'>Sửa</a>
                  <form action="{{ route('admin.Chapter.destroy', ['chapter'=>$chapter->id]) }}" method="post" class="d-inline-block">
                    @method('delete')
                    @csrf
                    <button class='btn btn-danger m-1' type='submit'>Xóa</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $chapters->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
