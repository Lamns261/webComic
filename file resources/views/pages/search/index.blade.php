@extends('layouts.app')


@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-4 ps-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('homePage') }}" class="text-decoration-none">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
    </ol>
</nav>

<div class="edit-view-footer">
    <div class="row px-3">
        <div class="col-12 my-4">
            <h2 class="mb-4">
                Kết quả tìm kiếm cho từ khóa: <span class="fw-bold">{{ $keyword }}</span>
            </h2>
            @if (count($comics) === 0)
            <p>Không có kết quả phù hợp với từ khóa</p>
            @endif
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
                                    <span class="truncate-140 text-left">
                                        <i class="fas fa-user-edit me-1"></i>
                                        {{ Str::limit($comic->author->name, 20) }}
                                    </span>
                                </div>
                                <div class="d-inline-block border border-success text-success text-center" style="min-width: 105px;">
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
                    {{ $comics->appends(Request::all())->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
