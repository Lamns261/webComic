@extends('layouts.app')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-4 ps-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('homePage') }}" class="text-decoration-none">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $comic->name }}</li>
    </ol>
</nav>

@include('pages.comic.comicDetail')

@include('pages.comic.comicContent')

@endsection

