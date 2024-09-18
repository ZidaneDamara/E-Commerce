@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Purchase</h4>
                        <form class="row" method="POST" action="{{ route('admin.purchase.store') }}">
                            @csrf
                            <div class="col-md-8">
                                <div class="callout callout-info">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <h6 style="font-size: 12px">Reference Number</h6>
                                            <input type="text" class="form-control" id="reference_number"
                                                name="reference_number" placeholder="Enter proof number" disabled
                                                value="{{ $reference_number }}">
                                            <input type="hidden" name="reference_number" value="{{ $reference_number }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <h6 style="font-size: 12px">Date</h6>
                                            <input type="date" class="form-control" id="date" name="date"
                                                placeholder="Enter date" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <h6 style="font-size: 12px">Desc</h6>
                                            <input type="text" class="form-control" id="desc" name="desc"
                                                placeholder="Enter desc" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="callout callout-danger">
                                    <div class="form-group">
                                        <h6 style="font-size: 12px">Supplier</h6>
                                        <select name="supplier_id" id="supplier_id" class="form-control" style="width: 100%"
                                            required>
                                            <option value="" disabled selected>Select supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="callout callout-primary">
                                    <table class="table table-striped table-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Purchase Price</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-primary" id="addRowButton">Add
                                                            Purchase Data</button>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="dataPembelianBody">
                                            <tr class="addDataPembelian">
                                                <td>1</td>
                                                <td>
                                                    <input type="text" class="form-control" id="code_1" name="code[]"
                                                        placeholder="Enter code" disabled style="width: 100px">
                                                </td>
                                                <td>
                                                    <div style="width: 300px">
                                                        {{-- select2 --}}
                                                        <select name="product_id[]" class=" form-control" id="item_1"
                                                            style="width: 100%" onchange="updateHargaBeli(1)">
                                                            <option value="" disabled selected>Select product</option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}"
                                                                    data-code="{{ $product->product_code }}" data-price="0">
                                                                    {{ $product->product_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="qty_1" name="qty[]"
                                                        placeholder="Enter quantity" style="width: 100px"
                                                        oninput="updateSubTotal(1)">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="purchase_price_1"
                                                        name="purchase_price[]" placeholder="Enter purchase price">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="subtotal_1"
                                                        name="subtotal[]" placeholder="Enter subtotal" style="width: 150px">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            window.updateHargaBeli = function(index) {
                const itemSelect = document.getElementById(`item_${index}`);
                const selectedOption = itemSelect.options[itemSelect.selectedIndex];
                const code = selectedOption.getAttribute('data-code');
                const price = selectedOption.getAttribute('data-price');

                document.getElementById(`code_${index}`).value = code;
                document.getElementById(`purchase_price_${index}`).value = price;
            }

            window.updateSubTotal = function(index) {
                const purchasePrice = parseFloat(document.getElementById(`purchase_price_${index}`).value) || 0;
                const qty = parseFloat(document.getElementById(`qty_${index}`).value) || 0;
                const subTotal = purchasePrice * qty;

                document.getElementById(`subtotal_${index}`).value = subTotal;
            }

            $('#addRowButton').click(function() {
                const tbody = $('#dataPembelianBody');
                const rowCount = tbody.find('tr').length;
                const index = rowCount + 1;

                const options = `@foreach ($products as $product)
                    <option value="{{ $product->id }}" data-code="{{ $product->product_code }}" data-price="0">
                        {{ $product->product_name }}
                    </option>
                @endforeach`;

                const newRow = $(`
                    <tr class="addDataPembelian">
                        <td>${index}</td>
                        <td>
                            <input type="text" class="form-control" id="code_${index}" name="code[]" placeholder="Enter code" disabled style="width: 100px">
                        </td>
                        <td>
                            <div style="width: 300px">
                                <select name="product_id[]" class="form-control select2" id="item_${index}" style="width: 100%" onchange="updateHargaBeli(${index})">
                                    <option value="" disabled selected>Select product</option>
                                    ${options}
                                </select>
                            </div>
                        </td>
                        <td>
                            <input type="number" class="form-control" id="qty_${index}" name="qty[]" placeholder="Enter quantity" style="width: 100px" oninput="updateSubTotal(${index})">
                        </td>
                        <td>
                            <input type="number" class="form-control" id="purchase_price_${index}" name="purchase_price[]" placeholder="Enter purchase price">
                        </td>
                        <td>
                            <input type="number" class="form-control" id="subtotal_${index}" name="subtotal[]" placeholder="Enter subtotal" style="width: 150px">
                        </td>
                    </tr>
                `);

                tbody.append(newRow);
                // $('.select2').select2();
            });
        });
    </script>
@endsection
