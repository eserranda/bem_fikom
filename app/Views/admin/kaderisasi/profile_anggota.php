<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid mt-4 px-lg-4 ">
                    <div class="profile-foreground position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg">
                            <img src="/assets/images/blog-4.jpg" alt="" class="profile-wid-img" />
                        </div>
                    </div>
                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                        <div class="row g-4">
                            <div class="col-auto">
                                <!-- <div class="avatar-xl">
                <img src="<?= base_url(); ?>/assets/images/<?= user()->user_image; ?>" alt="user-img"
                    class="avatar-xl rounded" />
            </div> -->

                                <div class="profile-user position-relative d-inline-block mx-auto">
                                    <img src="<?= base_url(); ?>/assets/images/<?= user()->user_image; ?>"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        alt="user-profile-image">

                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit tekan" name="your_id"
                                        id="tekan" onclick="gantifoto('<?= user()->id; ?>')">

                                        <?= form_open_multipart('', ['class' => 'formupload']) ?>
                                        <?= csrf_field(); ?>
                                        <!-- <div class="eser" style="display: none;"> -->
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="your_id"
                                                value="<?= user()->id; ?>">
                                            <input id="profile-img-file-input" type="file"
                                                class="profile-img-file-input" id="foto" name="foto">
                                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                    <i class="ri-camera-fill"></i>
                                                </span>
                                                <div class="invalid-feedback errorFoto">

                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-2 tblgantifoto" id="tes" style="display: none;">
                                    <button type="submit" class="btn btn-info btn-sm m-1.btnupload"
                                        id=.btnupload">Upload
                                    </button>
                                    <?= form_close() ?>
                                    <button class="btn btn-danger btn-sm btnbatal">Batal</button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1"><?= $nama_anggota; ?></h3>
                                    <p class="text-white-75"><?= $stambuk_anggota; ?></p>

                                    <div class="hstack text-white-50 gap-1">
                                        <div>
                                            <a href="https://www.instagram.com/<?= $instagram; ?>"
                                                class="avatar-xs d-block" target="_blank">
                                                <span class="avatar-title rounded-circle fs-16 bg-light text-danger">
                                                    <i class="ri-instagram-line"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                <span class="avatar-title rounded-circle fs-16 bg-light text-info">
                                                    <i class="ri-facebook-fill"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="https://www.tiktok.com/@<?= $tiktok; ?>" class="avatar-xs d-block"
                                                target="_blank">
                                                <span
                                                    class="avatar-title rounded-circle fs-16 bg-light text-dark text-light">
                                                    <i class="bx bxl-tiktok"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="Https://wa.me/+62<?= $nomor_hp_anggota; ?>"
                                                class="avatar-xs d-block" target="_blank">
                                                <span class="avatar-title rounded-circle fs-16 bg-light text-success">
                                                    <i class="ri-whatsapp-line"></i>
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <!-- Tab panes -->
                                    <div class="tab-content pt-4 text-muted">
                                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xxl-3 px-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-3">Biodata</h5>
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Nama Lengkap
                                                                            </th>
                                                                            <td class="text-muted"><?= $nama_anggota; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Stambuk
                                                                            </th>
                                                                            <td class="text-muted">
                                                                                <?= $stambuk_anggota; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Gender
                                                                            </th>
                                                                            <td class="text-muted"><?= $gender; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Nama Angkatan
                                                                            </th>
                                                                            <td class="text-muted">
                                                                                <?= $nama_angkatan_anggota; ?>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Nomor hp</th>
                                                                            <td class="text-muted">
                                                                                <?= $nomor_hp_anggota; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">E-mail</th>
                                                                            <td class="text-muted">
                                                                                <?= $email_anggota; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Alamat</th>
                                                                            <td class="text-muted"><?= $alamat; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Status</th>
                                                                            <td class="text-muted"><?php
                                                                                                    if ($status == "Aktif") {
                                                                                                    ?>
                                                                                <span
                                                                                    class="badge bg-success">Aktif</span>
                                                                                <?php } ?>

                                                                                <?php
                                                                                if ($status == "Dipecat") {
                                                                                ?>
                                                                                <span class="badge bg-danger "><i
                                                                                        class="bi bi-exclamation-octagon me-1"></i>Dipecat</span>
                                                                                <?php } ?>

                                                                                <?php
                                                                                if ($status == "TidakDiketahui") {
                                                                                ?>
                                                                                <span
                                                                                    class="badge bg-warning text-dark"><i
                                                                                        class="bi bi-question-circle me-1"></i>Tanpa
                                                                                    Keterangan</span>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div><!-- end card body -->
                                                    </div><!-- end card -->

                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-9 px-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-3">About</h5>
                                                            <p>Hi I'm Anna Adame, It will be as simple as Occidental; in
                                                                fact, it will be Occidental. To an English person, it
                                                                will
                                                                seem like simplified English, as a skeptical Cambridge
                                                                friend of mine told me what Occidental is European
                                                                languages
                                                                are members of the same family.</p>

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
                        <!--end row-->

                    </div><!-- container-fluid -->

                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i
                            class="ri-close-line me-1 align-middle"></i> Close</a>
                </div>

            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $("#tekan").click(function() {
            $('.tblgantifoto').show();

        });

        $(".btnbatal").click(function() {
            $('.tblgantifoto').hide();
            location.reload();

        });
    });
    </script>