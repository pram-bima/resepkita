@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">
<div class="row mb-3 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Resep Saya</h3>
                    <a class="btn btn-primary" href="/resep/create" role="button">Tambah Resep Baru</a>
                </div>
                <div class="card-body">
                    <h3>Selamat Datang di Halaman Resepku</h3>
                    <p>Berikut adalah resep - resep yang telah Anda buat :</p>
                </div>
            </div>
        </div>
    </div>
@foreach ($resep as $item)
    <div class="row mb-3 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>{{$item->judul}}</h3></div>
                <div class="card-body">

                    <img class="img-fluid mb-3" src="<?= URL::to('/data_gambar'); ?>/{{$item->gambar}}">
                    <form action="{{ route('resep.destroy',$item->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('resep.show',$item->id) }}">Selengkapnya</a>
                        <a class="btn btn-primary" href="{{ route('resep.edit',$item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <br>
                    @if ($item->isaccepted)
                        <h3>Selamat, resep Anda telah dipublikasikan</h3>
                    @elseif ($item->isrejected) 
                        <h3>Maaf, resep Anda belum dapat dipublikasikan. Silakan mencoba lagi.</h3>
                    @elseif (!$item->isaccept && !$item->isrejected)
                        <h3>Silakan menunggu, resep Anda sedang dievaluasi</h3> 
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
