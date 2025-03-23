@extends('admin.layout.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Daftar Kamar</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <a class="btn btn-danger" href="/room/create">Tambah Kamar</a>
            <form
            class="d-none d-sm-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-danger"" type="button">
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
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 + (10 * ($halaman - 1)); @endphp
                        @foreach($rooms as $room)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->code_room }}</td>
                            <td>{{ $room->category->name }}</td>
                            <td>Rp. {{ number_format($room->price, 0, ',', '.')  }}</td>
                            <td class="text-center {{ $room->availability_status == 'available' ? 'text-success' : 'text-danger' }}">{{ $room->availability_status == 'available' ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                            <td class="text-center">
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
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