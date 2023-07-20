<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <img src="<?php if ($user_image != "") { ?><?= base_url(); ?>/<?= $user_image; ?>?<?= user()->updated_at; ?><?php } else { ?><?= base_url(); ?>/assets/images/users/default.jpg"
                    <?php } ?>" class="img-fluid rounded-3" alt="profile-img">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-ghost-success mt-1" data-bs-dismiss="modal"><i
                            class="ri-close-fill align-bottom"></i>close</button>
                </div>
            </div>
        </div>
    </div>
</div>