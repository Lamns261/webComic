@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Quản lý Chapter') }}</div>

        <div class="card-body">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active btn btn-info m-1">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
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
                <th scope="col" style="width:25%">Tên Truyện - Sách</th>
                <th scope="col" style="width:25%">Tác giả</th>
                <th scope="col" style="width:10%">Số chương</th>
                <th scope="col" style="width:20%">Trạng thái</th>
                <th scope="col">Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($comics as $comic)
              <tr>
                <td>{{ $comic->name }}</td>
                <td>{{ $comic->author->name }}</td>
                <td>{{ $comic->chapters->count() }}</td>

                @if($comic->is_complete === 1)
                <td class="text-success">Hoàn thành</td>
                @else
                <td class="text-danger">Đang ra</td>
                @endif

                <td>
                  <a href="{{ route('showChapterOfComic', ['comic'=>$comic->id]) }}" class="btn btn-info">Quản lý Chapter</a>

                  @if ($comic->is_complete === 0)
                  <form action="{{ route('admin.ComicComplete', ['comic'=>$comic->id]) }}">
                    @csrf
                    <button class='btn btn-success m-1' type='submit'>Hoàn thành</button>
                  </form>
                  @else
                  <form action="{{ route('admin.ComicUncomplete', ['comic'=>$comic->id]) }}">
                    @csrf
                    <button class='btn btn-danger m-1' type='submit'>Đang ra</button>
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
