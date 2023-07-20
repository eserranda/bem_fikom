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

                    <?= $this->renderSection('content'); ?>

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