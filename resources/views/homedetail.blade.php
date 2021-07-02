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
                    <a class="btn btn-success" href="{{ route('home') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
