<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        .error {
            color: red;
            font-size: 1rem;
            position: relative;
            line-height: 1;
            width: 15.5rem;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include(' dashboard.layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('dashboard.layout.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('main-content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('dashboard.layout.footer')
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
    <script src="{{ URL::asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
        integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('dashboard/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ URL::asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('dashboard/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('dashboard/js/demo/chart-pie-demo.js') }}"></script>


    <script>
        // $(document).ready(function() {
        //     $("#frmCreateUpdate").submit(function(e) {
        //         e.preventDefault();
        //     }).validate({
        //             rules: {
        //                 name: "required",
        //                 price: {
        //                     required: true,
        //                     min: 10000
        //                 },
        //             },
        //             messages: {
        //                 name: "Name là bắt buộc",
        //                 price: {
        //                     required: "Price là bắt buộc",
        //                     min: "Price lớn hơn 10000"
        //                 }
        //             },
        //             submitHandler: function(form) {
        //                 console.log("aaaaaaaaaaaaa");
        //                 /*
        //     let name = $("#txtName").val();
        //                             let price = $("#txtPrice").val();
        //                             let idCategory = $("#txtIdCategory").val();
        //                             let formData = new FormData();
        //                             let fileInput = $("#txtImage")[0].files[0];
        //                             formData.append('img_url', fileInput);
        //                             formData.append('name', name);
        //                             formData.append('price', price);
        //                             formData.append('category_id', idCategory);

        //                             console.log("formData", formData);

        //                             $.ajax({
        //                                 url: "http://127.0.0.1:8000/api/product",
        //                                 type: "POST",
        //                                 data: formData,
        //                                 processData: false,
        //                                 contentType: false,
        //                                 success: function(data) {
        //                                     $("#myModal").modal("hide");
        //                                     getAllProducts();
        //                                 },
        //                                 error: function(error) {
        //                                     console.log(error);
        //                                 }
        //                             });
        //                             */
        //             })
        //     }
        // });
    </script>
</body>

</html>
