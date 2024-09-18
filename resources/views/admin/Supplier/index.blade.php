@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Supllier</h4>
                        <a href="{{ route('admin.supplier.create') }}"
                            class="btn btn-primary btn-sm d-inline-block mb-3">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Supplier</th>
                                        <th>Contact Person</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $supplier->supplier_name }}</td>
                                            <td>{{ $supplier->supplier_phone }}</td>
                                            <td>{{ $supplier->supplier_address }}</td>
                                            <td>
                                                <a href="{{ route('admin.supplier.edit', $supplier->id) }}"
                                                    class="btn btn-sm btn-light">Edit</a>
                                                <form action="{{ route('admin.supplier.destroy', $supplier->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
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
