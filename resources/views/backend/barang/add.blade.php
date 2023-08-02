@extends('backend.layout.base')

@section('content')
<<<<<<< HEAD
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="font-size: 40px">{{ $title }}</h5>
                </div>
                <div class="card-body">
                    <form action="/addBarang" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" id="nama_barang" name="nama_barang"
                                        placeholder="Masukan Nama Barang"/>
                                        @error('nama_barang')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
=======
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0" style="font-size: 40px">{{ $title }}</h5>
            </div>
            <div class="card-body">
                <form action="/addBarang" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="Masukan Nama Barang" required />
>>>>>>> fdf13eabfbff9cb0a908d533a524d6fb249f405f
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
                                <div class="mb-3">
                                    <label class="form-label" for="jenis">Jenis</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" value="{{ old('jenis') }}" id="jenis" name="jenis"
                                        placeholder="Masukan Jenis" />
                                        @error('jenis')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="harga">Harga</label>
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" id="harga" name="harga"
                                        placeholder="Masukan Harga" />
                                        @error('harga')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="ukuran">Ukuran</label>
                                    <input type="text" class="form-control @error('ukuran') is-invalid @enderror" value="{{ old('ukuran') }}" id="ukuran" name="ukuran"
                                        placeholder="Masukan Ukuran" />
                                        @error('ukuran')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="stok">Stok</label>
                                    <input type="number" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" id="stok" name="stok"
                                        placeholder="Masukan Jenis"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        @error('stok')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="keyword">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" id="image" name="image"
                                        placeholder="Thumbnail" />
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea name="deskripsi" id="editor1" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="keyword">Deskripsi</label>
                            <textarea name="deskripsi" cols="100" rows="10" required></textarea>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="/barang" type="button" class="btn btn-success">Kembali</a>
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