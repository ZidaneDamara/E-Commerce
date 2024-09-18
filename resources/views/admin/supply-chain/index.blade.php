@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Supply Chain</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Reference Number</th>
                                        <th>Date</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplyChains as $no => $sc)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td style="text-transform: uppercase">{{ $sc->reference_code }}</td>
                                            <td>{{ \Carbon\Carbon::parse($sc->date)->format('d M Y') }}</td>
                                            <td>{{ $sc->product->product_name }}</td>
                                            <td>{{ $sc->quantity }}</td>
                                            <td>Rp. {{ number_format($sc->product_price, 0, ',', '.') }}</td>
                                            <td>{{ $sc->code }}</td>
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
