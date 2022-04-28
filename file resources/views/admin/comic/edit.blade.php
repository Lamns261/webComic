@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Chỉnh sửa Truyện - Sách') }}</div>

        <div class="card-body">
          <form action="{{ route('admin.Comic.update', ['comic' => $comic->id])}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="form-group mb-3">
              <label for="name">Tên Sách - Truyện</label>
              <input type="text" class="form-control" name="name" value="{{ $comic->name }}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="author_id">Tác giả</label>
              <select name="author_id" class="form-control">
                @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ $comic->author_id === $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
              </select>
              @error('author_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="category_id">Thể loại truyện</label>
              <select name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $comic->category_id === $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
              </select>
              @error('category_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="cats">Tất cả danh mục truyện</label><br>
              @foreach($cats as $cat)
              <div class="form-check form-check-inline" name="cats">
                <input class="form-check-input" name="cats[]" type="checkbox" id="cat_{{ $cat->id }}"
                    value="{{ $cat->id }}"
                    @foreach($comic->cats as $catOfComic)
                    {{ $catOfComic->name === $cat->name ? 'checked' : '' }}
                    @endforeach>
                <label class="form-check-label" for="cat_{{ $cat->id }}">{{ $cat->name }}</label>
              </div>
              @endforeach
            </div>

            <div class="form-group mb-3">
              <label for="summary">Tóm tắt nội dung</label>
              <textarea class="form-control" name="summary" rows="5" id="comic_summary_edit">{!! $comic->summary !!}</textarea>
              @error('summary')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <img-uploader></img-uploader>
              @if ($comic->image)
              <img src="{{ asset('storage/imgUploads/'.$comic->image) }}" alt="" style="max-width: 200px" class="mb-3">
              @endif
              @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <a href="{{ route('admin.Comic.index') }}" class="btn btn-primary">Trở lại</a>
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
  setTimeout(function() {
    CKEDITOR.replace('comic_summary_edit');
  }, 500);
</script>
@endsection
