@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Produk</h4>

                        <form class="forms-sample" method="POST" action="{{ route('admin.produk.update', $produk->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="product_code">Kode Produk</label>
                                <input type="text" class="form-control" id="product_code" name="product_code"
                                    value="{{ $produk->product_code }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="product_name">Nama Produk</label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="{{ $produk->product_name }}">
                            </div>

                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $produk->category_id ? 'selected' : '' }}>
                                            {{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_price">Harga Produk</label>
                                <input type="number" class="form-control" id="product_price" name="product_price"
                                    value="{{ $produk->product_price }}">
                            </div>

                            <div class="form-group">
                                <label for="product_description">Deskripsi Produk</label>
                                <textarea class="form-control" id="product_description" name="product_description">{{ $produk->product_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="product_stock">Stok Produk</label>
                                <input type="number" class="form-control" id="product_stock" name="product_stock"
                                    value="{{ $produk->product_stock }}">
                            </div>

                            <div class="form-group">
                                <label for="cover">Cover</label>
                                <input type="file" class="form-control" id="cover" name="cover">
                                @if ($produk->cover)
                                    <img src="{{ asset('img/' . $produk->cover) }}" alt="Cover"
                                        style="max-width: 100px;">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <input type="file" class="form-control" id="photo" name="photo[]" multiple>
                                @php
                                    $photos = json_decode($produk->photo, true) ?? [];
                                @endphp
                                @foreach ($photos as $photo)
                                    <img src="{{ asset('img/' . $photo) }}" alt="Foto Produk" style="max-width: 100px;">
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="{{ route('admin.produk.index') }}" class="btn btn-light">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
