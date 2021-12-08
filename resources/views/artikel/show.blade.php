@extends('layouts.depan.app')
@section('content')

<div class="col-lg-8">
    <!-- Post content-->
    <article>
        <!-- Post header-->
        <header class="mb-4">
            <!-- Post title-->
            <h1 class="fw-bolder mb-1">{{ $artikel->name }}</h1>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2">{{ $artikel->category->era }}</div>
            <!-- Post categories-->
            <div class="badge text-decoration-none text-muted fst-italic mb-2">{{ $artikel->watak }}</div>
        </header>
        <!-- Preview image figure-->
        <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('storage/'.$artikel->file) }}" alt="..." /></figure>
        <!-- Post content-->
        <section class="mb-5">
            <p>{{ $artikel->konten }}</p>
        </section>
    </article>
</div>

@endsection
