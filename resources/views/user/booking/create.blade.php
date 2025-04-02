@extends('user.layout.main')

@section('content')

<section class="page-section section-texture" id="booking">
    <div class="container">
        <div class="text-center">
            <h2 class="text-uppercase title-heading mt-3">Formulir Pemesanan</h2>
            <h3 class="section-subheading subtitle">Lengkapi data berikut untuk melanjutkan pemesanan kamar.</h3>
        </div>

        <!-- Detail Kamar -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center">{{ $room->name }} | <span class="text-dark"> {{ $room->category->name }}</span></h4>
                        <p class="card-text text-center mt-2"></p>
                        <img src="/images/room/{{ $room->image }}" class="card-img-top" alt="" style="border: solid 1px grey">
                        <h4 class="card-text text-center mt-3 "><strong class="bg-warning p-1">Rp. {{ number_format($room->price, 0, ',', '.') }}</strong> / malam</h4>
                        <p class="card-text text-center">{{ $room->facilities }}</p>
                        <p class="card-text text-center" style="margin-top: -20px;">Kapasitas: <strong>{{ $room->category->max_guests }} orang</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-body p-4">
                        <form action="/booking/store/{{ $room->code_room }}" method="POST">
                            @csrf
                            <input type="hidden" name="room_id" value="">

                            <div class="mb-3">
                                <label for="check_in_date" class="form-label">Tanggal Check-in</label>
                                <input type="date" name="check_in_date" id="check_in_date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="check_out_date" class="form-label">Tanggal Check-out</label>
                                <input type="date" name="check_out_date" id="check_out_date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="guests" class="form-label">Jumlah Tamu</label>
                                <input type="number" name="guests" id="guests" class="form-control" min="1" max="{{ $room->max_guests }}" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" style="border: 0px" class="btn-read-more">Lanjut ke Pembayaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

