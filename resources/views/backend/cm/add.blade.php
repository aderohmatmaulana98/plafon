@extends('backend.layout.base')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="font-size: 40px">{{ $title }}</h5>
                </div>
                <div class="card-body">
                    <form action="/addCM" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_cm">Nama Count Manager</label>
                                    <input type="text" class="form-control" id="nama_cm" name="nama_cm"
                                        placeholder="Masukan Nama Count Manager" />
                                </div>
                            </div>                            
                            <div class="col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/cm" type="button" class="btn btn-success">Kembali</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- <script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
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
    </script> --}}
@endsection
