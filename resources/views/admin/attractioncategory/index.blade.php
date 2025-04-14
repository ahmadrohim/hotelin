@extends('admin.layout.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Daftar Kategori Wisata</h1>
    </div>

    <div class="mb-4">
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
            <a class="btn btn-danger" href="/categoryAttraction/create">Tambah Kategori</a>
            <form action="{{ $url }}" class="d-none d-sm-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="Kata kunci..." name="search" value="{{ request('search') }}">
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
                            <th style="width: 40px" class="text-center">No</th>
                            <th>Nama Kategori</th>
                            <th>Kode Kategori</th>
                            <th class="text-center" colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @if($categories->count() > 0)
                            @php $no = 1 + (10 * ($halaman - 1)); @endphp
                            @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->code_category_attraction }}</td>
                                <td style="width: 40px" class="text-center">
                                    <a href="/categoryAttraction/{{ $category->code_category_attraction }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                                <td style="width: 40px" class="text-center">
                                    <a href="/categoryAttraction/edit/{{ $category->code_category_attraction }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                </td>
                                <td style="width: 40px" class="text-center">
                                    <form action="/categoryAttraction/destroy/{{ $category->code_category_attraction }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $category->name }}?')" type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Tidak ada kategori wisata untuk ditampilkan.</td>
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