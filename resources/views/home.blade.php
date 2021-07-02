@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@foreach ($resep as $item)
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$item->judul}}</div>

                <div class="card-body">
                    <img class="img-fluid mb-3" src="<?= URL::to('/data_gambar'); ?>/{{$item->gambar}}">

                    <a class="btn btn-info" href="{{ route('home.detail',$item->id) }}">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
