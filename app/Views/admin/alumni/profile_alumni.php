<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile Alumni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid mt-4 px-lg-4">
                    <div class="profile-foreground position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg">
                            <img src="/assets/images/blog-4.jpg" alt="" class="profile-wid-img" />
                        </div>
                    </div>
                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                        <div class="row g-4">
                            <div class="col-auto">
                                <div class="avatar-xl">
                                    <img src="/assets/images/users/avatar-1.jpg" alt="user-img"
                                        class="avatar-xl rounded" />

                                </div>
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1"><?= $nama; ?></h3>
                                    <p class="text-white-75"><?= $stambuk_alumni; ?></p>
                                </div>
                            </div>


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
                                                                        <td class="text-muted"><?= $nama; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Stambuk
                                                                        </th>
                                                                        <td class="text-muted"><?= $stambuk_alumni; ?>
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
                                                                        <td class="text-muted"><?= $nama_angkatan; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Nomor HP </th>
                                                                        <td class="text-muted"><?php
                                                                                                if ($nomor_hp == "") {
                                                                                                    echo " - ";
                                                                                                } else {
                                                                                                    echo $nomor_hp;
                                                                                                }
                                                                                                ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">E-mail </th>
                                                                        <td class="text-muted"> <?php
                                                                                                if ($email == "") {
                                                                                                    echo " - ";
                                                                                                } else {
                                                                                                    echo $email;
                                                                                                }
                                                                                                ?>
                                                        </div>
                                                        </td>
                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0" scope="row">Alumni Tahun
                                                            </th>
                                                            <td class="text-muted"><?= $alumni_tahun; ?></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Social Media</h5>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <div>
                                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                <span
                                                                    class="avatar-title rounded-circle fs-16 bg-soft-dark text-dark text-light">
                                                                    <i class="ri-github-fill"></i>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                <span
                                                                    class="avatar-title rounded-circle fs-16 bg-soft-primary text-primary">
                                                                    <i class="ri-global-fill"></i>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                <span
                                                                    class="avatar-title rounded-circle fs-16 bg-soft-danger text-danger">
                                                                    <i class="ri-dribbble-fill"></i>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                <span
                                                                    class="avatar-title rounded-circle fs-16 bg-soft-success text-success">
                                                                    <i class="ri-pinterest-fill"></i>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
</div>
</div>