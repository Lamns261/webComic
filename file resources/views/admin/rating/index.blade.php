@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Quản lý đánh giá truyện') }}</div>

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
                <th scope="col">Đánh giá bị vi phạm</th>
                <th scope="col" style="width: 15%">Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ratings as $rating)
              <tr>
                <td>{{ $rating->comment }}</td>

                <td>
                    <a href="{{ route('notValidRating', ['rating'=>$rating->id]) }}" class='btn btn-success m-1'>Ok</a>
                  <form action="{{ route('deleteRating', ['rating'=>$rating->id]) }}" method="post" class="d-inline-block">
                    @method('delete')
                    @csrf
                    <button class='btn btn-danger m-1' type='submit'>Xóa</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
            {{ $ratings->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
