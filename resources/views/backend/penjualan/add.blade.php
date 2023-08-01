@extends('backend.layout.base')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0" style="font-size: 40px">{{ $title }}</h5>
            </div>
            <div class="card-body">
                <form action="/addPenjualan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="distributor_id">Nama Distributor</label>
                                <select class="form-select form-select" aria-label=".form-select-sm example"
                                    name="distributor_id" id="distributor_id" required>
                                    <option value="" selected>-Pilih Distributor-</option>
                                    @foreach($distributor as $pj)
                                    <option value="{{ $pj->id }}">{{ $pj->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- @for ($i = 1; $i <= 12; $i++) <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="nilai{{ $i }}">Total Pembelian {{ $i }}:</label>
                                <input type="number" name="nilai{{ $i }}" id="nilai{{ $i }}"
                                    placeholder="Masukan total" />
                            </div>
                    </div>
                    @endfor --}}

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai1">Total Pembelian Januari</label>
                            <input type="text" class="form-control" id="nilai1" name="nilai1"
                                placeholder="Masukan Total Pembelian" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai2">Total Pembelian Februari</label>
                            <input type="text" class="form-control" id="nilai2" name="nilai2"
                                placeholder="Masukan Total Pembelian" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai3">Total Pembelian Maret</label>
                            <input type="text" class="form-control" id="nilai3" name="nilai3"
                                placeholder="Masukan Total Pembelian" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai4">Total Pembelian April</label>
                            <input type="text" class="form-control" id="nilai4" name="nilai4"
                                placeholder="Masukan Total Pembelian" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai5">Total Pembelian Mei</label>
                            <input type="text" class="form-control" id="nilai5" name="nilai5"
                                placeholder="Masukan Total Pembelian" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai6">Total Pembelian Juni</label>
                            <input type="text" class="form-control" id="nilai6" name="nilai6"
                                placeholder="Masukan Total Pembelian" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai7">Total Pembelian Juli</label>
                            <input type="text" class="form-control" id="nilai7" name="nilai7"
                                placeholder="Masukan Total Pembelian" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai8">Total Pembelian Agustus</label>
                            <input type="text" class="form-control" id="nilai8" name="nilai8"
                                placeholder="Masukan Total Pembelian" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai9">Total Pembelian September</label>
                            <input type="text" class="form-control" id="nilai9" name="nilai9"
                                placeholder="Masukan Total Pembelian" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai10">Total Pembelian Oktober</label>
                            <input type="text" class="form-control" id="nilai10" name="nilai10"
                                placeholder="Masukan Total Pembelian" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai11">Total Pembelian November</label>
                            <input type="text" class="form-control" id="nilai11" name="nilai11"
                                placeholder="Masukan Total Pembelian" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nilai12">Total Pembelian Desember</label>
                            <input type="text" class="form-control" id="nilai12" name="nilai12"
                                placeholder="Masukan Total Pembelian" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="retur">Retur</label>
                            <input type="text" class="form-control" id="retur" name="retur"
                                placeholder="Masukan Retur" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="/penjualan" type="button" class="btn btn-success">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    function calculateTotal(inputNumber) {
            var input = document.getElementById('nilai' + inputNumber);
            var totalElement = document.getElementById('total');
            
            var nilai = parseFloat(input.value);
            if (isNaN(nilai)) {
                nilai = 0;
            }
            
            // Mengupdate total
            var total = parseFloat(totalElement.innerHTML);
            total += nilai;
            totalElement.innerHTML = total.toFixed(2);
        }
</script> --}}


<script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
            height: '500',
            // Ensure that the Magic Line plugin, which is required for this sample, is loaded.
            extraPlugins: 'magicline',
            // Magic Line does not require any additional ACF settings.
            // We set config.extraAllowedContent because HTML code in this sample contains
            // a <div> element with custom styles that we would like to allow.
            extraAllowedContent: 'div{border,background,text-align}',
            removeButtons: 'PasteFromWord'

        });

        var rupiah = document.getElementById("harga");
        rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
</script>
@endsection