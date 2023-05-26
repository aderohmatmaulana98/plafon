@extends('backend.layout.base')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="font-size: 20px">{{ $title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{  route('penjualan.editPenjualan', $penjualan->id)  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $penjualan->id }}" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="nilai1">Distributor</label>
                                <select class="form-select form-select" aria-label=".form-select-sm example" name="distributor_id" id="distributor_id">
                                    <option selected>-Pilih Distributor-</option>
                                    @foreach ($penjualan1 as $dd )
                                            <option @if($penjualan->distributor_id == $dd->id) selected @endif value="{{ $dd->id }}">{{ $dd->full_name}}</option>
                                            @endforeach
                                    </select>
                            </div>
                            <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="nilai1">Total Pembelian Januari</label>
                                <input type="text" class="form-control" id="nilai1"  name="nilai1"
                                    placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai1 }}"/>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai2">Total Pembelian Februari</label>
                                    <input type="text" class="form-control" id="nilai2" name="nilai2"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai2 }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai3">Total Pembelian Maret</label>
                                    <input type="text" class="form-control" id="nilai3" name="nilai3"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai3 }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai4">Total Pembelian April</label>
                                    <input type="text" class="form-control" id="nilai4" name="nilai4"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai4 }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai5">Total Pembelian Mei</label>
                                    <input type="text" class="form-control" id="nilai5" name="nilai5"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai5 }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai6">Total Pembelian Juni</label>
                                    <input type="text" class="form-control" id="nilai6" name="nilai6"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai6 }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai7">Total Pembelian Juli</label>
                                    <input type="text" class="form-control" id="nilai7" name="nilai7"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai7 }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai8">Total Pembelian Agustus</label>
                                    <input type="text" class="form-control" id="nilai8" name="nilai8"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai8 }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai9">Total Pembelian September</label>
                                    <input type="text" class="form-control" id="nilai9" name="nilai9"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai9 }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai10">Total Pembelian Oktober</label>
                                    <input type="text" class="form-control" id="nilai10" name="nilai10"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai10 }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai11">Total Pembelian November</label>
                                    <input type="text" class="form-control" id="nilai11" name="nilai11"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai11 }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nilai12">Total Pembelian Desember</label>
                                    <input type="text" class="form-control" id="nilai12" name="nilai12"
                                        placeholder="Masukan Total Pembelian" value="{{ $penjualan->nilai12 }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="retur">Retur</label>
                                    <input type="text" class="form-control" id="retur" name="retur"
                                        placeholder="Masukan Retur" />
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="/penjualan" type="button" class="btn btn-success">Kembali</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
