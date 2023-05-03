@extends('backend.layout.base', ['title' => 'Dashboard - Administrator - Laravel 9'])

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .card {
            border: none
        }



        .brand {
            font-size: 13px
        }

        .act-price {
            color: 0055ff;
            font-weight: 700
        }

        .dis-price {
            text-decoration: line-through
        }

        .about {
            font-size: 14px
        }

        .color {
            margin-bottom: 10px
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            padding: 2px 9px;
            border: 2px solid #0055ff;
            display: inline-block;
            color: #0055ff;
            border-radius: 3px;
            text-transform: uppercase
        }

        label.radio input:checked+span {
            border-color: #0055ff;
            background-color: #0055ff;
            color: #fff
        }

        .btn-danger {
            background-color: #0055ff !important;
            border-color: #0055ff !important
        }

        .btn-danger:hover {
            background-color: #040404 !important;
            border-color: #040404 !important
        }

        .btn-danger:focus {
            box-shadow: none
        }

        .cart i {
            margin-right: 10px
        }
    </style>
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image"
                                        src="{{ asset('storage/images/barang/' . $barang->image . '') }}" width="500" />
                                </div>
                                <div class="thumbnail text-center"> <img onclick="change_image(this)"
                                        src="https://i.imgur.com/Dhebu4F.jpg" width="70">
                                    <img onclick="change_image(this)"
                                        src="{{ asset('storage/images/barang/' . $barang->image . '') }}" width="70">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">

                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
                                    <h5 class="text-uppercase">{{ $barang->nama_barang }}</h5>
                                    <div class="price d-flex flex-row align-items-center"> <span
                                            class="act-price">{{ $barang->harga }}</span>
                                        {{-- <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span>
                                        </div> --}}
                                    </div>
                                </div>
                                <p class="about">{!! html_entity_decode($barang->deskripsi) !!}</p>
                                <div class="sizes mt-5">
                                    {{-- <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio"
                                            name="size" value="S" checked> <span>S</span> </label> <label
                                        class="radio"> <input type="radio" name="size" value="M"> <span>M</span>
                                    </label> <label class="radio"> <input type="radio" name="size" value="L">
                                        <span>L</span> </label> <label class="radio"> <input type="radio" name="size"
                                            value="XL"> <span>XL</span> </label> <label class="radio"> <input
                                            type="radio" name="size" value="XXL"> <span>XXL</span> </label> --}}
                                </div>
                                <div class="cart mt-4 align-items-center"> <button
                                        class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i
                                        class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function change_image(image) {
            var container = document.getElementById("main-image");
            container.src = image.src;
        }
        document.addEventListener("DOMContentLoaded", function(event) {});
    </script>
@endsection
