<?= $this->extend('admin/index'); ?>

<?= $this->section('head_title'); ?>
<link href="<?= base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- swiper css -->

<?php echo view('partials/title-meta', array('title' => 'Profile')); ?>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>

<div class="eser" style="display: show;">

    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="<?= base_url(); ?>/assets/images/fikom2.JPG" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-xl">
                    <img src="<?= base_url(); ?>/<?= user()->user_image; ?>" alt="user-img" class="avatar-xl rounded" />
                </div>
            </div>
            <!--end col-->

            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1"><?= user()->fullname; ?></h3>
                    <p class="text-white-75"><?= user()->username; ?></p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="hstack text-white-50 gap-1">

                            <?php if (user()->instagram != "") { ?>
                            <div>
                                <a href="https://www.instagram.com/<?= user()->instagram; ?>" class="avatar-xs d-block"
                                    target="_blank">
                                    <span class="avatar-title rounded-circle fs-16 bg-light text-danger">
                                        <i class="ri-instagram-line"></i>
                                    </span>
                                </a>
                            </div>
                            <?php } ?>

                            <?php if (user()->facebook != "") { ?>
                            <div>
                                <a href="<?= user()->facebook; ?>" class="avatar-xs d-block">
                                    <span class="avatar-title rounded-circle fs-16 bg-light text-info">
                                        <i class="ri-facebook-fill"></i>
                                    </span>
                                </a>
                            </div>
                            <?php } ?>

                            <?php if (user()->tiktok != "") { ?>
                            <div>
                                <a href="https://www.tiktok.com/<?= user()->tiktok; ?>" class="avatar-xs d-block"
                                    target="_blank">
                                    <span class="avatar-title rounded-circle fs-16 bg-light text-dark text-light">
                                        <i class="bx bxl-tiktok"></i>
                                    </span>
                                </a>
                            </div>
                            <?php } ?>

                            <?php if (user()->phone_number != "") { ?>
                            <div>
                                <a href="Https://wa.me/+62<?php $a = user()->phone_number;
                                                                $b = ltrim($a, '0');
                                                                echo $b; ?>" class="avatar-xs d-block" target="_blank">
                                    <span class="avatar-title rounded-circle fs-16 bg-light text-success">
                                        <i class="ri-whatsapp-line"></i>
                                    </span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

            <!--end col-->

        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">
                        <a class="btn btn-success" onclick="settingg('<?= user()->id ?>')"><i
                                class="ri-edit-box-line align-bottom"></i> Edit
                            Profile</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Detail Profile</h5>

                                            <div class="row col-lg-8">
                                                <div class="col-lg-4">
                                                    <p>Nama</p>
                                                </div>

                                                <div class="col-lg-8">
                                                    <p class="fw-bold"><?= user()->fullname; ?></p>
                                                </div>
                                            </div>
                                            <div class="row col-lg-8">
                                                <div class="col-lg-4">
                                                    <p>Nama Panggilan</p>
                                                </div>

                                                <div class="col-lg-8">
                                                    <p class="fw-bold"><?= user()->nickname; ?></p>
                                                </div>
                                            </div>
                                            <div class="row col-lg-8">
                                                <div class="col-md-4">
                                                    <p>Stambuk </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="fw-bold"><?= user()->username; ?></p>
                                                </div>
                                            </div>
                                            <div class="row col-lg-8">
                                                <div class="col-md-4">
                                                    <p>Tempat, Tanggal lahir </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="fw-bold">
                                                        <?= user()->tempat_lahir; ?>,
                                                        <?php if (user()->tanggal_lahir != "") { ?>
                                                        <?= date('d-m-Y', strtotime(user()->tanggal_lahir)); ?>
                                                        <?php } else { ?>
                                                        -
                                                        <?php } ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row col-lg-8">
                                                <div class="col-md-4">
                                                    <p>Gender </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="fw-bold"><?= user()->gender; ?></p>
                                                </div>
                                            </div>

                                            <div class="row col-lg-8">
                                                <div class="col-md-4">
                                                    <p>Nama Angkatan </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="fw-bold"><?= user()->nama_angkatan; ?></p>
                                                </div>
                                            </div>
                                            <div class="row col-lg-8">
                                                <div class="col-md-4">
                                                    <p>Tahun Masuk </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="fw-bold"><?= user()->tahun_masuk; ?></p>
                                                </div>
                                            </div>

                                            <div class="row col-lg-8">
                                                <div class="col-md-4">
                                                    <p>Email </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="fw-bold"><?= user()->email; ?></p>
                                                </div>
                                            </div>
                                            <div class="row col-lg-8 ">
                                                <div class="col-md-4">
                                                    <p>Alamat </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="fw-bold"><?= user()->address; ?></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Quote</h5>
                                        <?= user()->quote; ?>

                                    </div>
                                    <!--end card-body-->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
</div>

<div class="randa" style="display: none;">

</div>


<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- profile init js -->
<!-- <script src="/assets/js/pages/profile.init.js"></script> -->

<!-- swiper js -->
<script src="<?= base_url(); ?>/assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- profile init js -->
<script src="<?= base_url(); ?>/assets/js/pages/profile-setting.init.js"></script>

<!-- App js -->
<script src="<?= base_url(); ?>/assets/js/app.js"></script>


<script>
function settingg(id) {
    // alert(id)
    $.ajax({
        type: "post",
        url: "<?= base_url('pengurus/edit_profile') ?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.eser').hide();
                $('.randa').html(response.sukses).show();
                $('#setting').show();
                // location.reload();
                // window.open(response.sukses, "setting", "_blank");
            }
        },

        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

function edit(id) {
    alert(id)
    $.ajax({
        type: "get",
        url: "<?= base_url('pengurus/edit_profile') ?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#exampleModalgrid').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}
</script>

<?= $this->endSection(); ?>