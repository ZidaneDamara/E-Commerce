@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <div class="row">

            <div class="col-12 d-flex grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between">
                            <h4 class="card-title mb-3">Data</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-md-flex mb-4">
                                    <div class="mr-md-5 mb-4">
                                        <h5 class="mb-1"><i class="typcn typcn-globe-outline mr-1"></i>Produk</h5>
                                        {{-- <h2 class="text-primary mb-1 font-weight-bold">{{ $produk }}</h2> --}}
                                    </div>
                                </div>
                                <canvas id="salesanalyticChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
