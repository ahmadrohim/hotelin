@extends('admin.layout.main')

@section('container')


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Manajemen Pengguna {{ $url == '/users/archived' ? 'Diarsipkan' : '' }}</h1> 
    </div>

    <div class="mb-4">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif  
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <a class="btn btn-danger" href="/users/create?from={{ $from }}">Tambah Pengguna</a>
            <form action="{{ $url }}"
                class="d-none d-sm-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="Cari pengguna..."
                        aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-search fa-sm text-white"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-danger text-white">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-center" colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @if(count($users) > 0)
                        @php $no = 1 + (10 * ($halaman - 1)); @endphp
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->role_name ?? '-' }}</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td class="text-center m-0 p-1 align-middle">
                                <a href="/users/{{ $user->code_user }}?from={{ $from }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                            <td class="text-center m-0 p-1 align-middle">
                                @if($user->trashed())
                                    <form action="/users/restore/{{ $user->code_user }}" method="POST" onsubmit="return confirm('Yakin ingin memulihkan data pengguna ini?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm m-0">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </form>                          
                                @else
                                    <a href="/users/edit/{{ $user->code_user }}?from={{ $from }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                @endif
                            </td>
                            <td class="text-center m-0 p-1 align-middle">
                                @if($user->trashed())
                                    <form action="/users/forceDelete/{{ $user->code_user }}" method="POST" class="d-inline" onsubmit="return confirm('Data akan dihapus secara permanen. Apakah kamu yakin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm m-0">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    <form class="d-inline" action="/users/destroy/{{ $user->code_user }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Apakah anda yakin ingin menghapus pengguna {{ $user->name }}?')" type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="7">Tidak ada pengguna untuk ditampilkan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-end mr-4">
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection