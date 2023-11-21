@extends('backend.layout.base')

@section('content')
    <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="font-size: 40px">
                <b>{{ $title }}</b>
            </h5>
            {{-- <a href="#" type="button" class="btn rounded-pill btn-primary justify-content-end"
                style="margin-left: 70%;">Add</a> --}}
        </div>
        <div class="container mt-4 ">
            <table id="datatable" class="table ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemesan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Pesanan</th>
                        <th>Harga</th>
                        <th>Pembayaran</th>
                        <th>Status barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pemesanan as $a)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td width="auto">{{ $a->full_name }}</td>
                            <td width="auto">{{ $a->nama_barang }}</td>
                            <td width="auto">{{ $a->jumlah }}</td>
                            <td width="auto">Rp. {{ number_format($a->harga) }}</td>
                            <td width="auto">
                                @if ($a->status == 'lunas')
                                    <span class="badge bg-success ">{{ $a->status }}</span>
                                @elseif ( $a->status == 'belum bayar')
                                    <span  class="badge bg-danger">{{ $a->status }}</span>
                                @else
                               
                                @endif
                            </td>
                            <td width="auto">
                                @if ($a->status == 'lunas' && $a->status_barang == 'proses')
                                    <span class="badge bg-info ">Proses pengiriman barang</span>
                                @elseif ( $a->status == 'belum bayar' && $a->status_barang == 'menunggu')
                                    <span  class="badge bg-warning">Menunggu Pembayaran</span>
                                @elseif ( $a->status == 'lunas' && $a->status_barang == 'sampai')
                                    <span  class="badge bg-success">Barang berhasil dikirim</span>
                                @elseif ( $a->status == 'belum bayar' &&  $a->status_barang == null)
                                    <span  class="badge bg-warning">Menunggu Pembayaran</span>
                                @else
                               
                                @endif
                            </td>
                            <td class="row p-2">
                                <span class="col-md-6 p-0">
                                    <a href="/pemesanan/edit/{{ $a->id }}" type="button" class="btn btn-success">Edit</a>
                                </span>
                                <span class="col-md-6 p-0">
                                    <form action="{{ route('pesanan.hapus',$a->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </span>
                            </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
