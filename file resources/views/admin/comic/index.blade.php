@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-12">
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
                  <a class="nav-link" href="{{ route('admin.Comic.create') }}">Thêm Truyện - Sách</a>
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
                <th scope="col">Danh mục</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col" style="width:12%">Tên Truyện - Sách</th>
                <th scope="col" style="width:12%">Tác giả</th>
                <th scope="col" style="width:25%">Tóm tắt nội dung</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($comics as $comic)
              <tr>
                <td>
                    <div>
                        {{ $comic->category->name }}
                    </div>
                    @foreach ($comic->cats as $cat)
                    @if ($cat->name !== $comic->category->name)
                    <div>
                        {{ $cat->name }}
                    </div>
                    @endif
                    @endforeach
                </td>
                <td>
                    <img src="{{ asset('/storage/imgUploads/'.$comic->image) }}" style="max-width: 100px" alt="">
                </td>
                <td>{{ $comic->name }}</td>
                <td>{{ $comic->author->name }}</td>
                <td>{!! Str::limit($comic->summary, 50) !!}</td>

                @if($comic->status === 1)
                <td class="text-success">Đang kích hoạt</td>
                @else
                <td class="text-danger">Không kích hoạt</td>
                @endif

                <td>
                  <a href="{{ route('admin.Comic.edit', ['comic'=>$comic->id]) }}" class='btn btn-warning m-1'>Sửa</a>
                  <form action="{{ route('admin.Comic.destroy', ['comic'=>$comic->id]) }}" method="post" class="d-inline-block">
                    @method('delete')
                    @csrf
                    <button class='btn btn-danger m-1' type='submit'>Xóa</button>
                  </form>

                  @if ($comic->status === 1)
                  <form action="{{ route('admin.ComicBlock', ['comic'=>$comic->id]) }}">
                    @csrf
                    <button class='btn btn-danger m-1' type='submit'>Khóa</button>
                  </form>
                  @else
                  <form action="{{ route('admin.ComicUnblock', ['comic'=>$comic->id]) }}">
                    @csrf
                    <button class='btn btn-success m-1' type='submit'>Mở khóa</button>
                  </form>
                  @endif

                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        {{ $comics->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
