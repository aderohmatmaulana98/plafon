@extends('backend.layout.base')

@section('content')
    <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="font-size: 20px">
                <b>{{ $title }}</b>
            </h5>
            <a href="/cm/add" type="button" class="btn rounded-pill btn-primary justify-content-end"
                style="margin-left: 70%;">Add</a>
        </div>
        <div class="container mt-4 ">
            <table id="datatable" class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Count Manager</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($cm as $a)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td width="auto">{{ $a->nama_cm}}</td>
                            <td>
                                {{-- <a href="/posts_/{{ $a->id }}" type="button" class="btn btn-primary"
                                    target="_blank">Live</a> --}}
                                <a href="/cm/edit/{{ $a->id }}" type="button" class="btn btn-success">Edit</a>
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
                                                <p>Anda yakin ingin menghapus {{ $a->nama_cm }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{  route('cm.deleteCM', $a->id)  }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="px-5 pb-8 text-center">
                                                    <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary">Cancel</button>
                                                    <button type="submit" class="btn btn-danger w-24">Delete</button>
                                                </div>
                                                </form>
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
