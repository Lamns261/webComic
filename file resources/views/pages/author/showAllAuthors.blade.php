@extends('layouts.app')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-4 ps-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('homePage') }}" class="text-decoration-none">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tác giả</li>
    </ol>
</nav>

<div class="edit-view-footer">
    <div class="row px-3">
        <div class="col-12 my-4">
            <h2 class="mb-4">
                Danh sách tác giả
            </h2>
        </div>
        @foreach($authors as $author)
        <div class="col-3 py-3 border-bottom text-secondary">
            <a href="{{ route('showAuthor', ['author_slug'=>$author->author_slug]) }}" class="text-decoration-none text-reset">
                {{$author->name}}
            </a>
        </div>
        @endforeach
    </div>
    <div class="d-flex mt-3">
        <div class="mx-auto">
            {{$authors->links("pagination::bootstrap-4")}}
        </div>
    </div>
</div>

@endsection
