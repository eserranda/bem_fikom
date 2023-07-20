<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Input data pengurus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('users/update_data_users', ['class' => 'formupdate']) ?>
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <!-- <div class="col-xxl-6">

                        <label for="username" class="form-label">NIM/Stambuk<span class="text-danger">*</span></label>
                        <select class="form-select" id="username" name="username"></select>
                        <div class=" invalid-feedback">
                            Masukkan Stambuk
                        </div>

                    </div> -->
                    <!--end col-->
                    <div class="col-xxl-6">
                        <label for="fullname" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                        <input type="hidden" name="id" class="form-control" id="id" placeholder="Nama Lengkap"
                            value="<?= $id; ?>">

                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Nama Lengkap"
                            value="<?= $fullname; ?>">

                        <div class="invalid-feedback errorfullname">

                        </div>
                    </div>
                    <!--end col-->

                    <!--end col-->
                    <div class="col-xxl-6">
                        <label for="form-select" class="form-label">Jabatan</label>
                        <select class="form-select" name="jabatan" id="jabatan">
                            <option value="">-Pilih Jababatan-</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Koordinator Kesekretariatan">Koordinator Kesekretariatan</option>
                            <option value="Koordinator Humas">Koordinator Humas</option>
                            <option value="Koordinator Keilmuan">Koordinator Keilmuan</option>
                            <option value="Koordinator Kaderisasi">Koordinator Kaderisasi</option>
                            <option value="Koordinator Kerohanian">Koordinator Kerohanian</option>
                            <option value="Koordinator Keuangan">Koordinator Keuangan</option>
                            <option value="Anggota Humas">Anggota Humas</option>
                            <option value="Anggota Kesekretariatan">Anggota Kesekretariatan</option>
                            <option value="Anggota Keilmuan">Anggota Keilmuan</option>
                            <option value="Anggota Kaderisasi">Anggota Kaderisasi</option>
                            <option value="Anggota Kerohanian">Anggota Kerohanian</option>
                            <option value="Anggota Keuangan">Anggota Keuangan</option>
                            <option value="Anggota">Anggota bem</option>

                        </select>
                        <div class="invalid-feedback errorjabatan">

                        </div>

                    </div>

                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.formupdate').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "get",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btnsave').attr('disable', 'disabled');
                $('.btnsave').html(
                    '<i class="spinner-border spinner-border-sm text-secondary" role="status"></i>'
                );
            },

            complete: function() {
                $('.btnsave').removeAttr('disabled');
                $('.btnsave').html('Save');
            },

            success: function(response) {
                if (response.error) {
                    if (response.error.fullname) {
                        $('#fullname').addClass('is-invalid');
                        $('.errorfullname').html(response.error
                            .fullname);
                    } else {
                        $('#fullname').removeClass('is-invalid');
                        $('.errorfullname').html('');
                    }

                    if (response.error.jabatan) {
                        $('#jabatan').addClass('is-invalid');
                        $('.errorjabatan').html(response.error
                            .jabatan);
                    } else {
                        $('#jabatan').removeClass('is-invalid');
                        $('.errorjabatan').html('');
                    }



                } else {
                    Swal.fire({
                        title: 'Success',
                        text: response.sukses,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000,
                        showCloseButton: true,
                    })
                    $('#exampleModalgrid').modal('hide');

                    datausers();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

        return false;
    });
});
</script>