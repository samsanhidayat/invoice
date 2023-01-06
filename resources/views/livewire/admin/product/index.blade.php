<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>{{ $title }}</h3>
                    <a href="{{ url('admin/product/create') }}" class="btn btn-outline-primary">Add Product</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Product</th>
                                <th>Nama Product</th>
                                <th>Price Product</th>
                                <th>Jumlah Product</th>
                                <th>Deskripsi Product</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $product->kode_product }}</td>
                                    <td>{{ $product->name_product }}</td>
                                    <td>{{ $product->price_product }}</td>
                                    <td>{{ $product->jml_product }}</td>
                                    <td>{{ $product->description_product }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ url('admin/product/' . $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/product/' . $product->id . '/edit') }}"
                                                class="btn btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
