@extends('layouts.depan.app')
@section('content')
    <div class="col-lg-8">
       <h1 class="mt-4">Tabel Data</h1>
    </br>
    @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
    @endif
       <p class="lead"><a class="btn btn-primary" href="{{ route('artikel.create') }}">Tambah Data</a></p>
       <table class="table table-striped table-">
           <thead>
               <tr>
                   <th scope="col">No</th>
                   <th scope="col">Era</th>
                   <th scope="col">Nama</th>
                   <th scope="col">Watak</th>
                   <th scope="col">Artikel</th>
                   <th scope="col"></th>
                   <th scope="col"></th>
               </tr>
           </thead>
           <body>
               @foreach($artikel as $index=>$artikel)
                <tr>
                    <td scope="row">{{ $index+1 }}</td>
                    <td scope="row">{{ $artikel->category->era }}</td>
                    <td scope="row"><a href="{{ route('artikel.detail',$artikel->id) }}">{{ $artikel->name }}</a></td>
                    <td scope="row">{{ $artikel->watak }}</td>
                    <td scope="row">{{ Str::limit($artikel->konten,150) }}</td>
                    <td scope="row"><a href="{{ route('artikel.edit',$artikel->id) }}">Ubah</a></td>
                    <td scope="row"><a href="{{ route('artikel.delete',$artikel->id) }}">Hapus</a></td>
                </tr>
               @endforeach
           </body>
       </table>
    </div>
@endsection
