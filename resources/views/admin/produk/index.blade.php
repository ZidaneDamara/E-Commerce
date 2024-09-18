@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Produk</h4>
                        <a href="{{ route('admin.produk.create') }}"
                            class="btn btn-primary btn-sm d-inline-block mb-3">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Cover</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->category->category_name }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->product_stock }}</td>
                                            <td>{{ Str::limit($product->product_description, 50) }}</td>
                                            <td><img src="{{ asset('img/' . $product->cover) }}" alt="Cover"
                                                    style="max-width: 100px;"></td>
                                            <td>
                                                @php
                                                    $photos = json_decode($product->photo);
                                                @endphp
                                                @if ($photos)
                                                    @foreach ($photos as $photo)
                                                        <img src="{{ asset('img/' . $photo) }}" alt="Foto"
                                                            width="100">
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.produk.edit', $product->id) }}"
                                                    class="btn btn-sm btn-light">Edit</a>
                                                <form action="{{ route('admin.produk.destroy', $product->id) }}"
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
