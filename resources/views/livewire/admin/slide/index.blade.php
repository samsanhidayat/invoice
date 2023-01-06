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
                    <a href="{{ url('admin/slide/create') }}" class="btn btn-outline-primary">Add Slide</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Slide</th>
                                <th>Deskripsi Slide</th>
                                <th>Gambar Slide</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slides as $slide)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $slide->judul }}</td>
                                    <td>{{ $slide->description }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/sliders/' . $slide->image) }}" alt="img" />
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ url('admin/slide/' . $slide->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/slide/' . $slide->id . '/edit') }}"
                                                class="btn btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $slides->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
