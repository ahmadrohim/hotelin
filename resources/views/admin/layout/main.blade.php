<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hotelin</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       @include('admin.layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Navbar -->
               @include('admin.layout.navbar')
                <!-- End of Navbar -->

                <!-- Begin Page Content -->
               @yield('container')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           @include('admin.layout.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>

    <!-- JavaScript untuk Preview Gambar -->
    <script>
    function previewImage() {
        const input = document.getElementById("image");
        const preview = document.getElementById("preview");
        const label = input.nextElementSibling; // Mengupdate label file
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove("d-none"); // Menampilkan gambar
            };
            reader.readAsDataURL(input.files[0]);
            label.textContent = input.files[0].name; // Mengganti label dengan nama file
        }
    }

        // javascript untuk base price create
        document.addEventListener("DOMContentLoaded", function () {
            let categorySelect = document.getElementById("category_id");
            let priceInput = document.getElementById("price");
            let basePriceText = document.getElementById("base_price_text");

            // Fungsi untuk mengupdate label harga awal dan batas minimum input harga
            function updatePrice() {
                let selectedOption = categorySelect.options[categorySelect.selectedIndex];
                let basePrice = selectedOption.getAttribute("data-price");

                if (basePrice) {
                    // Tampilkan harga awal di label
                    basePriceText.innerText = "Rp " + new Intl.NumberFormat('id-ID').format(basePrice);

                    // Set minimum harga yang bisa diinputkan
                    priceInput.setAttribute("min", basePrice);

                    // Hanya ubah harga jika sedang dalam mode create atau harga sebelumnya lebih rendah dari base_price
                    if (!priceInput.value || parseInt(priceInput.value) < parseInt(basePrice)) {
                        priceInput.value = basePrice;
                    }
                } else {
                    basePriceText.innerText = "Rp 0";
                    priceInput.setAttribute("min", 0);
                }
            }

            // Panggil fungsi saat pertama kali halaman dimuat
            updatePrice();

            // Tambahkan event listener ketika user mengganti kategori kamar
            categorySelect.addEventListener("change", updatePrice);
        });

       
    </script>

</body>

</html>