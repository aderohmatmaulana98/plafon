@extends('backend.layout.base')

@section('content')
    <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="font-size: 40px">
                <b>{{ $title }}</b>
            </h5>
            <a href="/barang/add" type="button" class="btn rounded-pill btn-primary justify-content-end"
                style="margin-left: 70%;">Add</a>
        </div>
        <div class="container mt-4 ">
            <table id="datatable" class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Ukuran</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Dibuat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($barang as $a)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td width="auto">{{ $a->nama_barang }}</td>
                            <td width="auto">{{ $a->stok }}</td>
                            <td width="auto">{{ $a->ukuran }}</td>
                            <td width="auto">{{ $a->jenis }}</td>
                            <td width="auto">Rp. {{ number_format($a->harga) }}</td>
                            <td style="width:
                                    auto"><img
                                    src="{{ asset('storage/images/barang/' . $a->image . '') }}" alt=""
                                    style="width: 55px;height: 45px;"></td>
                            <td style="width:
                                    auto">{{ $a->created_at }}</td>
                            <td>
                                <a href="/posts_/{{ $a->id }}" type="button" class="btn btn-primary"
                                    target="_blank">Live</a>
                                <a href="/barang/edit/{{ $a->id }}" type="button" class="btn btn-success">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $a->id }}">Delete</button>
                            </td>
                            <div class="modal fade" id="delete{{ $a->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="deletemodal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonaturLabel">Hapus posts
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus {{ $a->nama_barang }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ url('deleteBarang', $a->id) }} "
                                                    class="btn btn-primary">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
