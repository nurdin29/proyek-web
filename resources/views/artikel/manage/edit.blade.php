@extends('layouts.depan.app')
@section('content')
    <div class="col-lg-8">
        <h1 class="mt-4">Ubah Data</h1>
    </br>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
        @endif
        <form method="post" action="{{ route('artikel.update',$artikel->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Kategori</label>
                <select class="form-control" name="category">
                    <option value="">Pilih Era</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if(old('category',$artikel->category_id)==$category->id) selected "selected" @endif>{{ $category->era }}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="name" value="{{ old('name',$artikel->name) }}">
            </div>
            </br>
            <div class="form-group">
                <label for="">Watak</label>
                <input type="text" class="form-control" name="watak" value="{{ old('watak',$artikel->watak) }}">
            </div>
            </br>
            <div class="form-group">
                <label for="">Artikel</label>
                <textarea type="text" class="form-control" name="konten">{{ old('konten',$artikel->konten) }}</textarea>
            </div>
            </br>
            <div class="form-group">
                <label for="">File</label>
                <p><img src="{{ asset('storage/'.$artikel->file) }}" class="img-thumbnail" width="200"></p>
                <input type="file" class="form-control" name="file" accept="image/*">
            </div>
            </br>
            <button type="submit" class="btn btn-primary">Submit</button>
            </br>
            </br>
        </form>
    </div>
@endsection
