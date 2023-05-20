@extends('backend.layout.base')

@section('content')
    <div class="card table-responsive shadow-lg">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="font-size: 20px">
                <b>{{ $title }}</b>
            </h5>
        </div>
        <div class="container mt-4 ">
            <div class="table-responsive">
                <table class="table table-striped ">
                    <tr>
                        <th scope="col" style="width: 400px;">Count Manager</th>
                        <td style="width: 0px;">:</td>
                        <td>{{ $distributor[0]->nama_cm}}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 400px;">Kode Distributor</th>
                        <td style="width: 0px;">:</td>
                        <td>{{ $distributor[0]->kode_distributor }}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 400px;">Distributor</th>
                        <td style="width: 0px;">:</td>
                        <td>{{ $distributor[0]->full_name }}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 400px;">Penanggung Jawab</th>
                        <td style="width: 0px;">:</td>
                        <td>{{ $distributor[0]->nama_penjab }}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 400px;">Username</th>
                        <td style="width: 0px;">:</td>
                        <td>{{ $distributor[0]->email }}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 400px;">Password</th>
                        <td style="width: 0px;">:</td>
                        <td>Panorama999</td>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 400px;">Kontak</th>
                        <td style="width: 0px;">:</td>
                        <td>{{ $distributor[0]->kontak }}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 400px;">Alamat</th>
                        <td style="width: 0px;">:</td>
                        <td>{{ $distributor[0]->alamat }}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 400px;">Area Cover</th>
                        <td style="width: 0px;">:</td>
                        <td>{{ $distributor[0]->area }}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 400px;">Jumlah Agen / Distributor</th>
                        <td style="width: 0px;">:</td>
                        <td> @if ($distributor[0]->jumlah_agen == null)

                            <span>-</span>
                            
                            @else
                                  {{ $distributor[0]->jumlah_agen}}
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <a href="/distributor" type="button" class="btn btn-success mt-3">Kembali</a>
@endsection
