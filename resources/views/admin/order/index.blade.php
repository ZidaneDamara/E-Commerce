@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order</h4>
                        {{-- <a href="{{ route('admin.produk.create') }}"
                            class="btn btn-primary btn-sm d-inline-block mb-3">Tambah</a> --}}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reference Number</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Total Price</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $no => $order)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $order->code }}</td>
                                            <td>
                                                @foreach (json_decode($order->carts_id) as $id)
                                                    @php
                                                        $item = App\Models\Carts::where('id', $id)->first();
                                                    @endphp
                                                    <p>
                                                        {{ $item->product->product_name }}
                                                        x
                                                        ({{ $item->quantity }})
                                                    </p>
                                                @endforeach
                                            </td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="{{ url('img/' . $order->image) }}" target="_blank">
                                                    <img src="{{ asset('img/' . $order->image) }}" alt="image"
                                                        style="max-width: 100px;">
                                                </a>
                                            </td>
                                            <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="{{ route('confirm', $order->code) }}" target="_blank"
                                                    class="btn btn-sm btn-light">See Detail</a>

                                                @if ($order->status == 'pending')
                                                    <form action="{{ route('admin.update_status_order') }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" value="verify" name="status">
                                                        <input type="hidden" value="{{ $order->code }}" name="code">

                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary">Confirm</button>
                                                    </form>
                                                    <form action="{{ route('admin.update_status_order') }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" value="reject" name="status">
                                                        <input type="hidden" value="{{ $order->code }}" name="code">

                                                        <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.update_status_order') }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" value="cancel" name="status">
                                                        <input type="hidden" value="{{ $order->code }}" name="code">

                                                        <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                                    </form>
                                                @endif
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
