@extends('admin.layout.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Daftar Pemesanan Kamar</h1>
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
        <div class="card-header py-3 d-flex justify-content-end">
            <form action="/reservation" class="d-none d-sm-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="Cari pemesanan..."
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
                            <th class="text-center">Nama Pemesan</th>
                            <th class="text-center">Nama Kamar</th>
                            <th class="text-center">Kategori Kamar</th>
                            <th class="text-center">Check-in</th>
                            <th class="text-center">Check-out</th>
                            <th class="text-center">Pembayaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @if(count($reservations) > 0)
                        @php $no = 1 + (10 * ($halaman - 1)); @endphp
                        @foreach($reservations as $reservation)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->room->name }}</td>
                            <td class="text-center">{{ $reservation->room->category->name }}</td>
                            <td class="text-center">{{ $reservation->check_in_date }}</td>
                            <td class="text-center">{{ $reservation->check_out_date }}</td>
                            <td class="text-center text-capitalize badges-sm {{ $reservation->status == 'paid' ? 'badge-success' : 'badge-warning' }}">{{ $reservation->payment_status }}</td>
                            <td class="text-center badges-sm text-capitalize {{ $reservation->status == 'confirmed' ? 'badge-success' : 'badge-warning' }}">{{ ucfirst($reservation->status) }}</td>
                            <td class="text-center m-0 p-1 align-middle">
                                <a href="/reservation/{{ $reservation->code_booking }}" class="btn btn-info btn-sm m-0">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td class="text-center m-0 p-1 align-middle">
                                <a href="/reservation/edit/{{ $reservation->code_booking }}" class="btn btn-warning btn-sm m-0">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="text-center m-0 p-1 align-middle">
                                <form action="/bookings/destroy/{{ $reservation->code_booking }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Apakah anda yakin menghapus pemesanan {{ $reservation->code_booking }} ?')" 
                                            type="submit" class="btn btn-danger btn-sm m-0">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="9">Tidak ada pemesanan untuk ditampilkan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end mr-4">
            {{ $reservations->links() }}
        </div>
    </div>
</div>


@endsection