@extends('layouts.app')


@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-4 ps-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('homePage') }}" class="text-decoration-none">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ route('showAllAuthors') }}" class="text-decoration-none">Tác giả</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $author->name }}</li>
    </ol>
</nav>

<div class="row px-3">
    <div class="col-12 my-4">
        <h2 class="mb-4">
            Tác giả {{ $author->name }}
        </h2>
        <p class="mb-3 lh-lg">
            {!! $author->info !!}
        </p>
    </div>

    <div class="col-12">
        <div class="row">
            @foreach($comics as $comic)
            <div class="col-4 mb-4">
                <div class="d-flex">
                    <a href="{{'/comic/'.$comic->comic_slug}}">
                        <img class="me-3" style="max-width: 72px" src="{{ asset('storage/imgUploads/'.$comic->image) }}" alt="Ảnh truyện" />
                    </a>
                    <div>
                        <h5>
                            <a href="{{'/comic/'.$comic->comic_slug}}" class="d-block text-decoration-none fw-bold text-info">
                                {{ $comic->name }}
                            </a>
                        </h5>
                        <p>
                            {{ Str::limit($comic->summary, 60) }}
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="me-auto text-secondary">
                                <a class="text-left text-decoration-none text-reset"
                                    href="{{'/categories/'.$comic->category->cat_slug}}">
                                    <i class="fas fa-feather-alt me-1"></i>
                                    {{ $comic->category->name }}
                                </a>
                            </div>
                            <div class="border border-success text-success text-center" style="min-width: 105px;">
                                {{ $comic->chapters->count() }} Chương
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            @endforeach
        </div>
        <div class="d-flex mt-3">
            <div class="mx-auto">
                {{$comics->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>

</div>

@endsection
