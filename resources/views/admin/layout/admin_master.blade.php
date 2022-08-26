<?php
$logo_add = App\Models\Admin\LogoManager::where('type','1')->first();

// dd($logo_add->logo_image);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">


    <link rel="icon" href="{{ (!empty($logo_add->logo_image ??''))?
        asset($logo_add->logo_image ??''):asset('public/media/brand/No-image.jpg') }}" style="width:50px; height:50px;" type="image/x-icon">

    <title>E-Commerce</title>
    <!-- Tags Input CDN CSS -->
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />

    <!-- toaster CDN CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- vendor css -->
    <!-- {{-- {{ asset('public/backend') }} --}} -->
    <link href="{{ asset('public/backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">

     <!-- Datatable css -->
     <link href="{{ asset('public/backend/lib/highlightjs/github.css') }}" rel="stylesheet">
     <link href="{{ asset('public/backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
     <link href="{{ asset('public/backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
   <!-- Datatable css -->

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/starlight.css') }}">
    <link href="{{ asset('public/backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
  <!-- Starlight CSS -->
</head>

<body>

    @include('admin.layout.sidebar')
    <!-- ########## START: LEFT PANEL ########## -->

    <!-- sl-header -->
    @include('admin.layout.header')
    <!-- sl-header -->
    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">E-Commerce</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        @yield('admin_content')

        <!-- sl-pagebody -->
        @include('admin.layout.footer')


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ###### #### -->
    <!-- sl-footer -->


    <script src="{{ asset('public/backend/lib/jquery/jquery.js') }} "></script>
    <script src="{{ asset('public/backend/lib/popper.js/popper.js') }} "></script>
    <script src="{{ asset('public/backend/lib/bootstrap/bootstrap.js') }} "></script>
    <script src="{{ asset('public/backend/lib/jquery-ui/jquery-ui.js') }} "></script>
    <script src="{{ asset('public/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }} "></script>


 <!-- Datatable js -->
    <script src="{{ asset('public/backend/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('public/backend/lib/select2/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });
    </script>
 <!--/ Datatable js -->


    <script src="{{ asset('public/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }} "></script>
    <script src="{{ asset('public/backend/lib/d3/d3.js') }} "></script>
    <script src="{{ asset('public/backend/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/chart.js/Chart.js') }} "></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.js') }} "></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.pie.js') }} "></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.resize.js') }} "></script>
    <script src="{{ asset('public/backend/lib/flot-spline/jquery.flot.spline.js') }} "></script>
    <script src="{{ asset('public/backend/js/starlight.js') }} "></script>
    <script src="{{ asset('public/backend/js/ResizeSensor.js') }} "></script>
    <script src="{{ asset('public/backend/js/dashboard.js') }} "></script>




    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>

    <script>
        @if (Session::has('messege'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif
    </script>

    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
</body>

</html>
