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
                    <h3>Bahan - bahan</h3>
                    {!!$item->bahan!!}
                    <h3>Alat - alat</h3>
                    {!!$item->alat!!}
                    <h3>Langkah</h3>
                    {!!$item->langkah!!}
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
</div>
@endforeach
@endsection
