@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Purchase Detail</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6>Reference Number</h6>
                                    <p>{{ $purchase->reference_number }}</p>
                                </div>
                                <div class="form-group">
                                    <h6>Date</h6>
                                    <p>{{ $purchase->date }}</p>
                                </div>
                                <div class="form-group">
                                    <h6>Supplier</h6>
                                    <p>{{ $purchase->supplier->supplier_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6>Description</h6>
                                    <p>{{ $purchase->desc }}</p>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-4">Purchased Products</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Purchase Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplyChains as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->product->product_code }}</td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->product_price }}</td>
                                            <td>{{ $item->quantity * $item->product_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">Total</th>
                                        <th>{{ $supplyChains->sum(function ($item) {return $item->quantity * $item->product_price;}) }}
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <a href="{{ route('admin.purchase.index') }}" class="btn btn-secondary mt-3">Back to Purchases</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
