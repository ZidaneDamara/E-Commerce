@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Supplier</h4>
                        <form method="POST" action="{{ route('admin.supplier.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Nama Supplier</label>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name"
                                    value="{{ old('supplier_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Contact Person</label>
                                <input type="text" class="form-control" id="supplier_phone" name="supplier_phone"
                                    value="{{ old('supplier_phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Alamat</label>
                                <input type="text" class="form-control" id="supplier_address" name="supplier_address"
                                    value="{{ old('supplier_address') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.supplier.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
