@extends('admin.layout.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Daftar Kamar</h1>
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
            <a class="btn btn-danger" href="/room/create">Tambah Kamar</a>
            <form action="/ourRoom"
            class="d-none d-sm-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-1 small" placeholder="Kata kunci..."
                    aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-danger"" type="submit">
                        <i  class="fas fa-search fa-sm text-white"></i>
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
                            <th>Nama Kamar</th>
                            <th>Kode Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Harga per Malam</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @if(count($rooms) > 0)
                        @php $no = 1 + (10 * ($halaman - 1)); @endphp
                        @foreach($rooms as $room)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->code_room }}</td>
                            <td>{{ $room->category->name }}</td>
                            <td>Rp. {{ number_format($room->price, 0, ',', '.')  }}</td>
                            <td class="text-center {{ $room->availability_status == 'available' ? 'text-success' : 'text-danger' }}">{{ $room->availability_status == 'available' ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                            <td class="text-center m-0 p-1 align-middle">
                                <a href="/room/{{ $room->code_room }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                            <td class="text-center m-0 p-1 align-middle">
                                <a href="/room/edit/{{ $room->code_room }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class="text-center m-0 p-1 align-middle">
                                <form class="d-inline" action="/room/destroy/{{ $room->code_room }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Apakah anda yakin menghapus data kamar {{ $room->name }} ? data yang dihapus tidak bisa dipulihkan!')" type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="7">Tidak ada kamar untuk ditampilkan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end mr-4">
            {{ $rooms->links() }}
        </div>
    </div>
</div>


@endsection