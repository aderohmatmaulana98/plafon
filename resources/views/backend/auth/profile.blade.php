@extends('backend.layout.base')

@section('content')

<div class="content">
    <!-- Navbar Start -->

    <!-- Navbar End -->
    <div class="card h-100">
        @if (Session::has('success'))
        <div class="alert alert-success mb-2">
            {{ Session::get('success') }}
        </div>
        @else
        
        @endif
        <div class="card-body">
            <h4 class="card-title">MY PROFILE</h4>
            <hr>
            <form method="POST" action="#">
                @csrf
                <div class="form-group row mb-2">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control " value="{{ $user->full_name }}" name="name"  autocomplete="current-password" readonly>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control" value="{{ $user->email }}" autocomplete="email" readonly>
                    </div>
                </div>
               
                <div class="form-group row mb-2">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                    <div class="col-md-6">
                        @if ($user->role_id == 1 )
                            <input id="email" type="text" class="form-control" value="Admin" autocomplete="email" readonly>
                        @elseif($user->role_id == 2)
                            <input id="email" type="text" class="form-control" value="Distributor" autocomplete="email" readonly>
                        @else
                            <input id="email" type="text" class="form-control" value="Pemilik Perusahaan" autocomplete="email" readonly>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Created At') }}</label>
                    <div class="col-md-6">
                        <input id="new_password_confirmation" type="text" class="form-control" value="{{ \Carbon\Carbon::parse($user->created_at)->format('d-M-Y') }}" name="new_password_confirmation"  readonly>
                    </div>
                </div>

            </form>
        </div>
        <!-- Content End -->
        
        @endsection
      
      
        </div>
        