    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">FORMAT</span>NEWS</h1>
                </a>
                <p>Ketika Tanda Tanya Menyelimuti Kampus Kuning Gading</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://www.instagram.com/lppm_format"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-spotify"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Contact Us</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i> Jl. Perintis Kemerdekaan KM.9, Kec. Tamalanrea, Kota Makassar.</p>
                <p><i class="fa fa-phone-alt mr-2"></i> +62 852 4241 7032</p>
                <p><i class="fa fa-envelope mr-2"></i> lppmofficial@gmail.com</p>
            </div>

            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>About</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Advertise</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Privacy & policy</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Terms & conditions</a>
                    <a class="text-secondary" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Contact</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-bold" href="#">FORMAT NEWS</a>. All Rights Reserved. 
			
			<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
			Designed by <a class="font-weight-bold" href="https://htmlcodex.com">LPPM Format</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('portal-assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('portal-assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('portal-assets/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('portal-assets/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('portal-assets/js/main.js') }}"></script>

    <script>
        // Menggunakan jQuery untuk menyembunyikan overlay setelah halaman dimuat
        $(window).on('load', function() {
            // Dapatkan elemen overlay
            const overlay = $('#loading-overlay');
            // Menambahkan kelas 'hidden' untuk memulai transisi
            overlay.addClass('hidden');
        });
    </script>
</body>

</html>