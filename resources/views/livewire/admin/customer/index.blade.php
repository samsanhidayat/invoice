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
                    @if (auth()->user()->role == 1)
                        <a href="{{ url('admin/user/create') }}" class="btn btn-outline-primary">Add User</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                @if (auth()->user()->role == 1)
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status == 0)
                                            <span class="bg-success rounded-2 p-1">Aktif</span>
                                        @else
                                            <span class="bg-warning rounded-2 p-1">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->role == 0)
                                            Customer
                                        @elseif ($user->role == 1)
                                            Owner
                                        @else
                                            Admin
                                        @endif
                                    </td>
                                    @if (auth()->user()->role == 1)
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ url('admin/user/' . $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
