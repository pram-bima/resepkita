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
                <div class="card-header">Daftar Resep Saya <a class="btn btn-primary" href="/resep/create" role="button">Tambah Resep Baru</a></div>

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
                <div class="card-header">{{$item->judul}}</div>
                <div class="card-body">
                    <img class="img-fluid" src="<?= URL::to('/data_gambar'); ?>/{{$item->gambar}}">
                    <h3>Bahan - bahan</h3>
                    {!!$item->bahan!!}
                    <h3>Alat - alat</h3>
                    {!!$item->alat!!}
                    <h3>Langkah</h3>
                    {!!$item->langkah!!}

                    @if($item->isaccepted==1) 
                        <h3>Selamat, resep Anda telah dipublikasikan</h3>
                    @elseif($item->isaccept==2) 
                        <h3>Maaf, resep Anda belum dapat dipublikasikan. Silakan mencoba lagi.</h3>
                    @else
                        <h3>Silakan menunggu, resep Anda sedang dievaluasi</h3>
                    @endif

                    <form action="{{ route('resep.destroy',$item->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('resep.show',$item->id) }}">Selengkapnya</a>
                        <a class="btn btn-primary" href="{{ route('resep.edit',$item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
