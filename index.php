<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS Bootstrap Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
        <title>Nice admin Template - The Ultimate Multipurpose admin template</title>
        <!-- Custom CSS -->
        <link href="assets/libs/morris.js/morris.css" rel="stylesheet">
        <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
        <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="dist/css/style.min.css" rel="stylesheet">
    </head>
    <body>

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

        <?php
        // include('pages/admin/dashboard.php');
        include('pages/home.php');
        ?>

        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
         <!-- Bootstrap Link for Javascript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- apps -->
        <script src="dist/js/app.min.js"></script>
        <script src="dist/js/app.init.mini-sidebar.js"></script>
        <script src="dist/js/app-style-switcher.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="assets/extra-libs/sparkline/sparkline.js"></script>
        <!--Wave Effects -->
        <script src="dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="dist/js/custom.js"></script>
        <!--This page JavaScript -->
        <!--chartis chart-->
        <script src="assets/libs/chartist/dist/chartist.min.js"></script>
        <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <!--c3 charts -->
        <script src="assets/extra-libs/c3/d3.min.js"></script>
        <script src="assets/extra-libs/c3/c3.min.js"></script>
        <!-- chartjs -->
        <script src="assets/libs/chart.js/dist/chart.min.js"></script>
        <script src="assets/libs/raphael/raphael.min.js"></script>
        <script src="assets/libs/morris.js/morris.min.js"></script>
        <script src="dist/js/pages/dashboards/dashboard2.js"></script>
    </body>
</html>