@extends('backend.layout.base')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="font-size: 20px">{{ $title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{  route('cm.editCM', $cm->id)  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $cm->id }}" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_cm">Nama Count Manager</label>
                                    <input type="text" class="form-control" id="nama_cm" name="nama_cm"
                                        placeholder="Masukan Nama Count Manager" value="{{ $cm->nama_cm }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="/cm" type="button" class="btn btn-success">Kembali</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
