<div class="row">
    <div class="col-lg-4">
        <?php
        foreach ($bendahara as $row) :
        ?>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>

                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="col-sm-4">

        <?php
        foreach ($ketua as $row) :
        ?>
        <div class="card ribbon-box right">
            <div class="card-body">
                <span class="ribbon ribbon-secondary round-shape"><span>Ketua</span></span>
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <?php
        foreach ($sekretaris as $row) :
        ?>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Koor_kesek -->

<div class="row d-flex justify-content-center">
    <div class="col-lg-4">
        <?php
        foreach ($koor_keseks as $row) :
        ?>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="row">
    <?php
    foreach ($anggota_keseks as $row) :
    ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- koor_kader -->

<div class="row d-flex justify-content-center">
    <div class="col-lg-4">
        <?php
        foreach ($koor_kader as $row) :
        ?>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="row">
    <?php
    foreach ($anggota_kader as $row) :
    ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- koor_humas -->
<div class="row d-flex justify-content-center">
    <div class="col-lg-4">
        <?php
        foreach ($koor_humas as $row) :
        ?>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="row">
    <?php
    foreach ($anggota_humas as $row) :
    ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- koor_keilmuan -->
<div class="row d-flex justify-content-center">
    <div class="col-lg-4">
        <?php
        foreach ($koor_keilmuan as $row) :
        ?>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="row">
    <?php
    foreach ($anggota_keilmuan as $row) :
    ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- koor_kerohanian -->
<div class="row d-flex justify-content-center">
    <div class="col-lg-4">
        <?php
        foreach ($koor_kerohanian as $row) :
        ?>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="row">
    <?php
    foreach ($anggota_kerohanian as $row) :
    ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Koor_keuangan -->
<div class="row d-flex justify-content-center">
    <div class="col-lg-4">
        <?php
        foreach ($koor_keuangan as $row) :
        ?>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="row">
    <?php
    foreach ($anggota_keuangan as $row) :
    ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="#!" onclick="foto('<?= $row->id; ?>')">
                        <img src="<?php if ($row->user_image != "") { ?><?= base_url(); ?>/<?= $row->user_image; ?>?<?= $row->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                            <?php } ?>" alt="profile" class="rounded-circle avatar-xl foto">
                    </a>
                    <div class="mt-3">
                        <h5 class="fs-15 profile-name"><?= $row->fullname; ?></h5>
                        <p class="text-muted fw-bold  profile-designation"><?= $row->jabatan; ?></p>
                    </div>
                    <div class="hstack gap-2 justify-content-center mt-4">
                        <div class="avatar-xs">
                            <a href="https://www.tiktok.com/<?= $row->tiktok; ?>"
                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="Https://wa.me/+62<?php $a = $row->phone_number;
                                                            $b = preg_replace("/[^0-9]/", "", $a);
                                                            $ab = ltrim($b, '0');
                                                            echo $ab; ?>" target="_blank"
                                class=" avatar-title bg-soft-success text-success rounded fs-16">
                                <i class="ri-whatsapp-line"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="<?= $row->facebook; ?>" class="avatar-title bg-soft-info text-info rounded fs-16">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </div>
                        <div class="avatar-xs">
                            <a href="https://www.instagram.com/<?= $row->instagram; ?>"
                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a class="btn btn-light w-100" onclick="detail('<?= $row->id; ?>')"> View
                    Profile</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script>
function foto(id) {
    // alert(id)
    $.ajax({
        type: "get",
        url: "<?= base_url('pengurus/foto') ?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#myModal').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

function detail(id) {
    // alert(id)
    $.ajax({
        type: "get",
        url: "<?= base_url('pengurus/detail_pengurus') ?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#myModal').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}
</script>