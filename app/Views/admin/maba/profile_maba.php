<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile Maba</h5>
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
                                <div class="avatar-xl">
                                    <img src="/assets/images/users/avatar-1.jpg" alt="user-img"
                                        class="avatar-xl rounded" />

                                </div>
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1"><?= $nama_maba; ?></h3>
                                    <p class="text-white-75"><?= $stambuk_maba; ?></p>

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
                                            <a href="Https://wa.me/+62<?= $nomor_hp_maba; ?>" class="avatar-xs d-block"
                                                target="_blank">
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
                            <div class="col-xxl-3 px-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Biodata Mahasiswa Baru</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Nama
                                                            Lengkap
                                                        </th>
                                                        <td class="text-muted"><?= $nama_maba; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Nama Panggilan
                                                        </th>
                                                        <td class="text-muted">
                                                            <?= $nama_panggilan_maba; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Stambuk
                                                        </th>
                                                        <td class="text-muted">
                                                            <?= $stambuk_maba; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Tempat Tgl
                                                            lahir
                                                        </th>
                                                        <td class="text-muted">
                                                            <?= $tempat_lahir_maba; ?>,
                                                            <?= $tanggal_lahir_maba; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Agama
                                                        </th>
                                                        <td class="text-muted"><?= $agama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Gender
                                                        </th>
                                                        <td class="text-muted"><?= $gender; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Asal Sekolah
                                                        </th>
                                                        <td class="text-muted"><?= $asal_sekolah; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Jurusan
                                                        </th>
                                                        <td class="text-muted"><?= $jurusan; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Alamat Asal
                                                        </th>
                                                        <td class="text-muted"><?= $alamat_asal; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Tahun Tamat
                                                        </th>
                                                        <td class="text-muted"><?= $tahun_tamat; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Nomor hp</th>
                                                        <td class="text-muted">
                                                            <?= $nomor_hp_maba; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail</th>
                                                        <td class="text-muted">
                                                            <?= $email_maba; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Hobby</th>
                                                        <td class="text-muted"><?= $hobby; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Nama Ayah</th>
                                                        <td class="text-muted"><?= $nama_ayah; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Nama Ibu</th>
                                                        <td class="text-muted"><?= $nama_ibu; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Pengalaman
                                                            Organisasi</th>
                                                        <td class="text-muted">
                                                            <?= $pengalaman_organisasi; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Alamat Di
                                                            Makassar
                                                        </th>
                                                        <td class="text-muted"><?= $alamat; ?></td>
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
                                        <h5 class="card-title mb-3">Alasan</h5>
                                        <p><?= $alasan; ?></p>

                                    </div>
                                    <!--end card-body-->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i
                        class="ri-close-line me-1 align-middle"></i> Close</a>
            </div>

        </div>
    </div>
</div>