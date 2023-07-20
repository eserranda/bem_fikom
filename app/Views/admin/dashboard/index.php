<?= $this->include('./partials/main') ?>

<head>

    <?= $this->renderSection('head_title'); ?>

    <?= $this->renderSection('css'); ?>
    <!-- Sweet Alert css-->
    <link href="<?= base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('./partials/head-css') ?>


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('./partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="col-lg-12 dashboard">
                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Anggota BEM</h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi-person-check-fill"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?= $dataanggota; ?></h6>
                                                <span class="text-success small pt-1 fw-bold">Anggota</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Sales Card -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card info-card sales-card">

                                    <div class="card-body">
                                        <h5 class="card-title">Alumni</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-mortarboard-fill"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?= $dataalumni; ?></h6>
                                                <span class="text-success small pt-1 fw-bold">Alumni</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->
                            <div class="col-lg-3 col-md-6 ">
                                <div class="card info-card sales-card ">
                                    <div class="card-body">
                                        <h5 class="card-title">Pengurus</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-person-workspace"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?= $datapengurus; ?></h6>
                                                <span class="text-success small pt-1 fw-bold">Pengurus</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <div class="col-lg-3 col-md-6 ">
                                <div class="card info-card sales-card ">
                                    <div class="card-body">
                                        <h5 class="card-title">Dipecat</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center text-danger">
                                                <i class="bi bi-exclamation-octagon"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?= $dipecat; ?></h6>
                                                <span class="text-success small pt-1 fw-bold">Anggota</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?= $this->include('./partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <?= $this->include('./partials/customizer') ?>

    <?= $this->include('./partials/vendor-scripts') ?>

    <?= $this->renderSection('js'); ?>


    <!-- Sweet Alerts js -->
    <script src="<?= base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url(); ?>/assets/js/app.js"></script>
</body>

</html>