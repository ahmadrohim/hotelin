<footer class="footer bg-dark text-white py-4">
    <div class="container">
        <hr>
        <div class="row">
            <!-- Informasi Hotel -->
            <div class="col-lg-4 text-center text-lg-start">
                <h5 class="fw-bold">{{ $Hotel->name }}</h5>
                <p class="mb-1"><i class="fas fa-map-marker-alt"></i> {{$Hotel->address}}</p>
                <p class="mb-1"><i class="fas fa-phone"></i> {{ $Hotel->phone }}</p>
                <p><i class="fas fa-envelope"></i> {{ $Hotel->email }}</p>
            </div>

            <!-- Media Sosial -->
            <div class="col-lg-4 text-center my-3 my-lg-0">
                <h5 class="fw-bold">Ikuti Kami</h5>
                <a class="btn btn-outline-light btn-social mx-2" href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-social mx-2" href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-social mx-2" href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-social mx-2" href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>

            <!-- Kebijakan & Hak Cipta -->
            <div class="col-lg-4 text-center text-lg-end">
                <h5 class="fw-bold">Lainnya</h5>
                <a class="text-white text-decoration-none me-3" href="#">Kebijakan Privasi</a>
                <a class="text-white text-decoration-none" href="#">Syarat & Ketentuan</a>
                <p class="mt-2">&copy; 2025 Hotel Dieng Indah. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>