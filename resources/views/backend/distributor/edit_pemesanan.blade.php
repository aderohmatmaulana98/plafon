@extends('backend.layout.base')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0" style="font-size: 20px">{{ $title }}</h5>
            </div>
            <div class="card-body">
                <form action="{{  route('pemesanan.editPemesanan', $pemesanan->id)  }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{ $pemesanan->id }}" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="status_barang">Status Barang</label>
                                <select class="form-control" id="status_barang" name="status_barang" required>
                                    <option value="proses" @if ($pemesanan->status_barang == 'proses') selected
                                        @endif>Proses pengiriman barang</option>
                                    <option value="menunggu" @if ($pemesanan->status_barang == 'menunggu') selected
                                        @endif>Barang belum diproses</option>
                                    <option value="sampai" @if ($pemesanan->status_barang == 'sampai') selected
                                        @endif>Barang telah sampai</option>
                                    <!-- Add other status options if needed -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="/pemesanan" type="button" class="btn btn-success">Kembali</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection