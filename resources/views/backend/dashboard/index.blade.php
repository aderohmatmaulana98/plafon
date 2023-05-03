@extends('backend.layout.base', ['title' => 'Dashboard - Administrator - Laravel 9'])

@section('content')
    <style>
        .deskripsi {
            display: block;
            text-overflow: ellipsis;
            word-wrap: break-word;
            overflow: hidden;
            max-height: 9.5em;
            line-height: 1.8em;
        }
    </style>
    <div class="container">
        <div class="row">
            @foreach ($barang as $br)
                <div class="col-md-3" style="padding: 10px;">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/images/barang/' . $br->image . '') }}"
                            style="height: 150px" alt="Card image cap" />
                        <div class="card-body deskripsi">
                            <h4 class="card-title">{{ $br->nama_barang }}</h4>
                            @php
                                $begin = new DateTime('now');
                                $end = new DateTime($br->created_at);
                                $date_post = $begin->diff($end);
                            @endphp
                            @if ($date_post->format('%h') <= 1)
                                <small class="text-muted">Posted on {{ $date_post->format('%i menit') }}</small>
                            @elseif ($date_post->format('%d') <= 1)
                                <small class="text-muted">Posted on {{ $date_post->format('%h jam %i menit') }}</small>
                            @else
                                <small class="text-muted">Posted on {{ $date_post->format('%d hari %h jam') }}</small>
                            @endif

                            <hr />
                            <p class="card-text">
                                {!! html_entity_decode($br->deskripsi) !!}
                            </p>

                        </div>
                        <hr style="margin-left: 23px;
margin-right: 23px;">
                        <div class="card-footer" style="margin-top: -30px; margin-left: 85px;">
                            <a href="/detailBarang/{{ $br->id }}" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
