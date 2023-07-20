<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-4 mb-lg-3 pb-lg-4">
                    <div class="profile-foreground position-relative mx-n4 mt-n4">
                        <!-- <div class="profile-foreground mx-n4 mt-n4"> -->
                        <div class="profile-wid-bg">
                            <img src="<?= base_url(); ?>/assets/images/fikom2.JPG" alt="img-background"
                                class="profile-wid-img" />
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-auto">
                            <div class="avatar-xl">
                                <img src="<?= base_url(); ?>/<?= $user_image; ?>?<?= user()->updated_at; ?>"
                                    alt="user-img" class="avatar-xl rounded" />
                            </div>
                        </div>

                        <div class="col">
                            <div class="p-0">
                                <h3 class="text-white mb-1"><?= $fullname; ?></h3>
                                <p class="text-white-75 mb-0"><?= $username; ?></p>
                                <p class="text-white-75 fw-bold mb-2"><?= $jabatan; ?></p>
                                <div class="hstack text-white-50 gap-1">
                                    <div class="hstack text-white-50 gap-1">

                                        <?php if ($instagram != "") { ?>
                                        <div>
                                            <a href="https://www.instagram.com/<?= $instagram; ?>"
                                                class="avatar-xs d-block" target="_blank">
                                                <span class="avatar-title rounded-circle fs-16 bg-light text-danger">
                                                    <i class="ri-instagram-line"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <?php } ?>

                                        <?php if ($facebook != "") { ?>
                                        <div>
                                            <a href="<?= $facebook; ?>" class="avatar-xs d-block">
                                                <span class="avatar-title rounded-circle fs-16 bg-light text-info">
                                                    <i class="ri-facebook-fill"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <?php } ?>

                                        <?php if ($tiktok != "") { ?>
                                        <div>
                                            <a href="https://www.tiktok.com/<?= $tiktok; ?>" class="avatar-xs d-block"
                                                target="_blank">
                                                <span
                                                    class="avatar-title rounded-circle fs-16 bg-light text-dark text-light">
                                                    <i class="bx bxl-tiktok"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <?php } ?>

                                        <?php if ($phone_number != "") { ?>
                                        <div>
                                            <a href="Https://wa.me/+62<?php $a = $phone_number;
                                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                                            $ab = ltrim($b, '0');
                                                                            echo $ab; ?>" class="avatar-xs d-block"
                                                target="_blank">

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
                    </div>
                </div>

                <div class="row">
                    <div class="col-xxl-3 px-1">
                        <div class="col-lg-12">
                            <div class="card p-2">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <p class="mb-0">Nama</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class="mb-0 fw-bold"><?= $fullname ?></p>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <p class="mb-0">Nama Panggilan</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class="mb-0 fw-bold"><?= $nickname ?></p>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <p class="mb-0">Stambuk</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class="mb-0 fw-bold"><?= $username ?></p>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <p class="mb-0">Gender</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class="mb-0 fw-bold"><?= $gender ?></p>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <p class="mb-0">Nama Angkatan</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class="mb-0 fw-bold"><?= $nama_angkatan ?></p>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <p class="mb-0">Tahun Masuk</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class="mb-0 fw-bold"><?= $tahun_masuk ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="mb-0">Alamat</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class="mb-0 fw-bold"><?= $address ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-9 px-1 mt-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="fw-bold">
                                    <!-- <h5 class="card-title mb-3">Quote</h5> -->
                                    " <?= $quote; ?> "
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>