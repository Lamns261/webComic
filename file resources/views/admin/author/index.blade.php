@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Quản lý tác giả') }}</div>

        <div class="card-body">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('admin.Author.create') }}">Thêm Tác giả</a>
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
                <th scope="col">Tên Tác giả</th>
                <th scope="col" style="width:45%">Tiểu sử</th>
                <th scope="col">Trạng thái</th>
                <th scope="col" style="width:22%">Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($authors as $author)
              <tr>
                <td>{{ $author->name }}</td>
                <td>{!! Str::limit($author->info, 120) !!}</td>

                @if($author->is_block === 1)
                <td class="text-danger">Không kích hoạt</td>
                @else
                <td class="text-success">Đang kích hoạt</td>
                @endif

                <td>
                  <a href="{{ route('admin.Author.edit', ['author'=>$author->id]) }}" class='btn btn-warning m-1'>Sửa</a>
                  <form action="{{ route('admin.Author.destroy', ['author'=>$author->id]) }}" method="post" class="d-inline-block">
                    @method('delete')
                    @csrf
                    <button class='btn btn-danger m-1' type='submit'>Xóa</button>
                  </form>

                  @if ($author->is_block === 1)
                  <form action="{{ route('admin.AuthorUnblock', ['author'=>$author->id]) }}" class="d-inline-block">
                    @csrf
                    <button class='btn btn-success m-1' type='submit'>Mở Khóa</button>
                  </form>
                  @else
                  <form action="{{ route('admin.AuthorBlock', ['author'=>$author->id]) }}" class="d-inline-block">
                    @csrf
                    <button class='btn btn-danger m-1' type='submit'>Khóa</button>
                  </form>
                  @endif

                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        {{ $authors->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
