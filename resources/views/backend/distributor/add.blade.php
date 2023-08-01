@extends('backend.layout.base')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0" style="font-size: 40px">{{ $title }}</h5>
            </div>
            <div class="card-body">
                <form action="/addDistributor" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="kode_distributor">Kode Distributor</label>
                                <input type="number" class="form-control" id="kode_distributor" name="kode_distributor"
                                    placeholder="Masukan kode distributor" />
                            </div>
                        </div>


                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="keyword">Category</label>
                                <select id="multicol-country" name="category_id" class="select2 form-select"
                                    data-allow-clear="true">
                                    <option selected="selected">
                                        Pilih Category
                                    </option>
                                    @foreach ($category as $a)
                                    <option value="{{ $a->id }}">
                                        {{ $a->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="col-md-6">
                            <label class="form-label" for="jenis">Count Manager</label>
                            <select class="form-select form-select" aria-label=".form-select-sm example"
                                name="count_manager_id" id="count_manager_id" required>
                                <option value="" selected>-Pilih Count Manager-</option>
                                @foreach($cm as $c)
                                <option value="{{ $c->id }}">{{ $c->nama_cm }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="full_name">Nama Distributor</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value=""
                                    placeholder="Masukan Nama Distributor" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="penjab_id">Penanggung Jawab</label>
                                <select class="form-select form-select" aria-label=".form-select-sm example"
                                    name="penjab_id" id="penjab_id" required>
                                    <option selected value="">-Pilih Penanggung Jawab-</option>
                                    @foreach($penjab as $pj)
                                    <option value="{{ $pj->id }}">{{ $pj->nama_penjab }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukan Email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="kontak">Kontak/No HP</label>
                                <input type="number" class="form-control" id="kontak" name="kontak"
                                    placeholder="Masukan No Hp" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Masukan alamat" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="area">Area Cover</label>
                                <input type="text" class="form-control" id="area" name="area" placeholder="Masukan area"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="jumlah_agen">Jumlah Agen / Distributor</label>
                                <input type="text" class="form-control" id="jumlah_agen" name="jumlah_agen"
                                    placeholder="Masukan Jumlah agen" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="/distributor" type="button" class="btn btn-success">Kembali</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


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