@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Chỉnh sửa Tác giả') }}</div>

        <div class="card-body">
          <form action="{{ route('admin.Author.update', ['author' => $author->id])}}" method="post">
            @method('put')
            @csrf

            <div class="form-group mb-3">
              <label for="name">Tên Tác giả</label>
              <input type="text" class="form-control" name="name" value="{{ $author->name }}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="info">Tiểu sử</label>
              <textarea class="form-control" name="info" rows="5" id="author_info_edit">{!! $author->info !!}</textarea>
              @error('info')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <a href="{{ route('admin.Author.index') }}" class="btn btn-primary">Trở lại</a>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('ckeditor')
<script>
    setTimeout(function(){
        CKEDITOR.replace( 'author_info_edit' );
    }, 500);
</script>
@endsection
