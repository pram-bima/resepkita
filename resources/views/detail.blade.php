@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$resep->judul}}</div>
                <div class="card-body">
                    <img class="img-fluid" src="<?= URL::to('/data_gambar'); ?>/{{$resep->gambar}}">

                    <h3>Bahan - bahan</h3>
                    {!!$resep->bahan!!}
                    <h3>Alat - alat</h3>
                    {!!$resep->alat!!}
                    <h3>Langkah</h3>
                    {!!$resep->langkah!!}

                    @if ($resep->isaccepted)
                        <h3>Selamat, resep Anda telah dipublikasikan</h3>
                    @elseif ($resep->isrejected) 
                        <h3>Maaf, resep Anda belum dapat dipublikasikan. Silakan mencoba lagi.</h3>
                    @elseif (!$resep->isaccept && !$resep->isrejected)
                        <h3>Silakan menunggu, resep Anda sedang dievaluasi</h3> 
                    @endif
                    <form>
                        <a class="btn btn-success" href="{{ route('resep.index') }}">Kembali</a>
                        <a class="btn btn-primary" href="{{ route('resep.edit',$resep->id) }}">Edit</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
