@extends('layouts.app')

@section('content')
<div class="container edit-view-footer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thêm Chapter') }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.Chapter.store')}}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="comic_id">Tên truyện</label>
                            <select name="comic_id" class="form-control">
                                <option value="{{ $comic->id }}">{{ $comic->name }}</option>
                            </select>
                            @error('comic_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Tên Chapter</label>
                            <input type="text" class="form-control" name="name" placeholder="Thêm Tên Chapter">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="content">Nội dung</label>
                            <textarea class="form-control" name="content" rows="5" id="chapter_content">
                            {{ old('content') }}
                            </textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <a href="{{ route('showChapterOfComic', ['comic'=>$comic->id]) }}" class="btn btn-primary">Trở lại</a>
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
    setTimeout(function(){
        CKEDITOR.replace( 'chapter_content' );
    }, 500);
</script>
@endsection
