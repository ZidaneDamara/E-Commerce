@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Produk Baru</h4>
                        <form method="POST" action="{{ route('admin.produk.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Nama Produk</label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="{{ old('product_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_price">Harga Produk</label>
                                <input type="text" class="form-control" id="product_price" name="product_price"
                                    value="{{ old('product_price') }}">
                            </div>
                            <div class="form-group">
                                <label for="product_description">Deskripsi Produk</label>
                                <textarea class="form-control" id="product_description" name="product_description">{{ old('product_description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_stock">Stok Produk</label>
                                <input type="text" class="form-control" id="product_stock" name="product_stock"
                                    value="{{ old('product_stock') }}">
                            </div>
                            <div class="form-group">
                                <label for="cover">Cover</label>
                                <input type="file" class="form-control" id="cover" name="cover">
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <input type="file" class="form-control" id="photo" name="photo[]" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
