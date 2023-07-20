<div class="row">

    <?php
    foreach ($ketua as $row) {
    ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="p-3 text-center">
                    <a href="javascript:void(0);" onclick="viewfoto('<?= $row->id ?>')">
                        <img src=" <?= base_url('' . $row->user_image . ''); ?>" alt="display-picture"
                            class="rounded-circle avatar-xl foto" ">
                    </a>
                    
                    <div class=" mt-3">
                        <h5 class="fs-20 profile-name"><?= $row->fullname ?></h5>
                        <p class="fs-12 m-1"><?= $row->username ?></p>
                        <p class="text-muted profile-designation fw-bold"><?= $row['jabatan']; ?></p>
                </div>
                <div class="hstack gap-2 justify-content-center mt-4">
                    <div class="avatar-xs">
                        <a href="javascript:void(0);"
                            class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                            <i class="bx bxl-tiktok"></i>
                        </a>
                    </div>
                    <div class="avatar-xs">
                        <a href="javascript:void(0);" class="avatar-title bg-soft-success text-success rounded fs-16">
                            <i class="ri-whatsapp-line"></i>
                        </a>
                    </div>
                    <div class="avatar-xs">
                        <a href="javascript:void(0);" class="avatar-title bg-soft-info text-info rounded fs-16">
                            <i class="ri-facebook-fill"></i>
                        </a>
                    </div>
                    <div class="avatar-xs">
                        <a href="javascript:void(0);" class="avatar-title bg-soft-danger text-danger rounded fs-16">
                            <i class="ri-instagram-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="offcanvas-foorter p-3 hstack gap-3 text-center position-relative">
                <a href="" class="btn btn-primary w-100"><i class="ri-user-3-fill align-bottom ms-1"></i> View
                    Profile</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

</div>


<div class="viewmodal" style="display: none;"></div>

<script>
function viewfoto(id_pengurus) {
    $.ajax({
        type: "get",
        url: "<?= base_url('pengurus/view_foto') ?>",
        data: {
            id_pengurus: id_pengurus
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