@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Purchase Products</h4>
                        <a href="{{ route('admin.purchase.create') }}"
                            class="btn btn-primary btn-sm d-inline-block mb-3">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reference Number</th>
                                        <th>Date</th>
                                        <th>Supplier</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $uniquePurchases = $purchases->unique('reference_number');
                                    @endphp
                                    @foreach ($uniquePurchases as $no => $purchase)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $purchase->reference_number }}</td>
                                            <td>{{ $purchase->date }}</td>
                                            <td>{{ $purchase->supplier->supplier_name }}</td>
                                            <td>{{ $purchase->desc }}</td>
                                            <td>
                                                <a href="{{ route('admin.purchase.show', ['purchase' => $purchase->reference_number]) }}"
                                                    class="btn btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
