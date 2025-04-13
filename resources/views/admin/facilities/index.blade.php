@extends('admin.layout.main')

@section('container')

<div class="container-fluid">
    <div class="mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Manajemen Fasilitas Hotel</h1> 
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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <a class="btn btn-danger" href="/facilities/create">Tambah Fasilitas</a>
            <form action="/facilities" class="d-none d-sm-inline-block form-inline ml-auto mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="Cari fasilitas..."
                        aria-label="Search" name="search" value="{{ request('search') }}">
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
                            <th>Nama Fasilitas</th>
                            <th>Deskripsi</th>
                            <th class="text-center" colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @if(count($facilities) > 0)
                        @php $no = 1 + (10 * ($halaman - 1)); @endphp
                        @foreach($facilities as $facility)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $facility->name }}</td>
                            <td>{{ Str::limit($facility->description, 50) }}</td>
                            <td class="text-center p-1 align-middle">
                                <a href="/facilities/{{ $facility->code_facilities }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                            <td class="text-center p-1 align-middle">
                                    <a href="/facilities/edit/{{ $facility->code_facilities }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class="text-center p-1 align-middle">
                                    <form action="/facilities/destroy/{{ $facility->code_facilities }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="8">Tidak ada data fasilitas</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-end mr-4">
            {{ $facilities->links() }}
        </div>
    </div>
</div>

    
@endsection