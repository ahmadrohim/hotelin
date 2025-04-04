@extends('admin.layout.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Daftar Kategori Kamar</h1>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
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
            <a class="btn btn-danger" href="/categoryRoom/create">Tambah Kategori</a>
            <form action="/categoryRoom"
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
                            <th>Nama Kategori</th>
                            <th>Kode Kategori</th>
                            <th>Harga Mulai Dari</th>
                            <th class="text-center">Maksimal Tamu</th>
                            <th class="text-center" colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @if(count($categories) > 0)
                        @php $no = 1 + (10 * ($halaman - 1)); @endphp
                        @foreach($categories as $category)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->code_category_room }}</td>
                            <td>Rp. {{ number_format($category->base_price, 0, ',', '.')  }}</td>
                            <td class="text-center">{{ $category->max_guests }}</td>
                            <td class="text-center m-0 p-1 align-middle" style="">
                                <a href="/categoryRoom/{{ $category->code_category_room }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                            <td class="text-center m-0 p-1 align-middle">
                                <a href="/categoryRoom/edit/{{ $category->code_category_room }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class="text-center m-0 p-1 align-middle">
                                <form class="d-inline" action="/categoryRoom/destroy/{{ $category->code_category_room }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Apakah anda yakin menghapus data kategori {{ $category->name }} ? data yang dihapus tidak bisa dipulihkan!')" type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></button>
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
            {{ $categories->links() }}
        </div>
    </div>
</div>

@endsection