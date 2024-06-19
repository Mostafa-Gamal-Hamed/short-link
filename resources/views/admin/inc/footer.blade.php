                <!-- Footer Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-light rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                جميع الحقوق محفوظة, <a href="#">{{ App\Models\Admin\WebsiteName::latest('id')->first()->name }}</a> &copy;.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer End -->
                </div>
            <!-- Content End -->
            </div>


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                class="bi bi-arrow-up"></i>
            </a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('admin/lib/chart/chart.min.js')}}"></script>
        <script src="{{asset('admin/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('admin/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('admin/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('admin/lib/tempusdominus/js/moment.min.js')}}"></script>
        <script src="{{asset('admin/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
        <script src="{{asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

        <!-- Jquery -->
        <script src="{{asset('admin/js/main.js')}}"></script>
    </body>

</html>
