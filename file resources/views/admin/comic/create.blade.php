@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thêm Truyện - Sách') }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.Comic.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Tên Sách - Truyện</label>
                            <input type="text" class="form-control" name="name" placeholder="Thêm tên" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="author_id">Tác giả</label>
                            <select name="author_id" class="form-control">
                                @foreach($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id">Thể loại truyện</label><br>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <input class="form-check-input" name="cats[]" type="checkbox" id="cat_{{ $cat->id }}" value="{{ $cat->id }}">
                                <label class="form-check-label" for="cat_{{ $cat->id }}">{{ $cat->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group mb-3">
                            <label for="summary">Tóm tắt nội dung</label>
                            <textarea class="form-control" name="summary" rows="5" id="comic_summary">{{ Request::old('summary') }}</textarea>
                            @error('summary')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <img-uploader></img-uploader>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <a href="{{ route('admin.Comic.index') }}" class="btn btn-primary">Trở lại</a>
                        <button type="submit" class="btn btn-primary">Thêm</button>
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
        CKEDITOR.replace('comic_summary');
    }, 500);
</script>
@endsection
