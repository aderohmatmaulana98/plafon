@extends('backend.layout.base')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="font-size: 20px">{{ $title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{  route('area.editArea', $area->id)  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $area->id }}" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_area">Nama Area</label>
                                    <input type="text" class="form-control" id="nama_area" name="nama_area"
                                        placeholder="Masukan Nama Area" value="{{ $area->nama_area }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="/area" type="button" class="btn btn-success">Kembali</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
