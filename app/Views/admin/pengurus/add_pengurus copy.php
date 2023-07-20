<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Input Data Pengurus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <?= form_open('pengurus/save_pengurus', ['class' => 'formadd']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="inputNanme4" class="form-label">Stambuk<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="stabuk_pengurus" name="stabuk_pengurus">
                        <div class="invalid-feedback errorstabuk_pengurus">

                        </div>
                    </div>

                    <div class="col-sm-6 ">
                        <label for="inputNanme4" class="form-label">Nama Lengkap<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus">
                        <div class="invalid-feedback errornama_pengurus">

                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-sm-6 mt-1">
                        <label for="inputEmail4" class="form-label">Jabatan<sup class="text-danger">*</sup></label>
                        <input type="number" class="form-control" id="jabatan_pengurus" name="jabatan_pengurus">
                        <div class="invalid-feedback errorjabatan_pengurus">

                        </div>
                    </div>

                    <div class="col-sm-6 mt-1">
                        <label for="inputEmail4" class="form-label">Email<sup class="text-danger">*</sup></label>
                        <input type="number" class="form-control" id="nomorhp_pengurus" name="nomorhp_pengurus">

                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-6 mt-1">
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-2">
                                <span class="avatar-title rounded-circle fs-16 bg-soft-dark text-dark">
                                    <i class="bx bxl-tiktok"><sup class="text-danger">*</sup></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" id="gitUsername" placeholder="Username">
                        </div>
                    </div>

                    <div class="col-sm-6 mt-1">
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-2">
                                <span class="avatar-title rounded-circle fs-16 bg-soft-primary text-primary">
                                    <i class="ri-facebook-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="websiteInput" placeholder="URL profil facebook">
                        </div>

                    </div>
                </div>

                <div class=" row mt-2">
                    <div class="col-sm-6 mt-1">
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-2">
                                <span class="avatar-title rounded-circle fs-16 bg-soft-success text-success">
                                    <i class="ri-whatsapp-line"><sup class="text-danger">*</sup></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="nomorhp_pengurus" name="nomorhp_pengurus"
                                placeholder="81134221xxx">
                        </div>
                    </div>

                    <div class="col-sm-6 mt-1">
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-2">
                                <span class="avatar-title rounded-circle fs-16 bg-soft-danger text-danger">
                                    <i class="ri-instagram-line"><sup class="text-danger">*</sup></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="instagram_pengurus" name="instagram_pengurus"
                                placeholder="@example">
                        </div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsave">Simpan</button>
                <button type="button" class="btn btn-secondary btnclose" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>


<script>
$(document).ready(function() {
    $('.formadd').submit(function(e) {
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
                    if (response.error.jenis) {
                        $('#jenis').addClass('is-invalid');
                        $('.errorjenis').html(response.error.jenis);
                    } else {
                        $('#jenis').removeClass('is-invalid');
                        $('.errorjenis').html('');
                    }

                    if (response.error.nama) {
                        $('#nama').addClass('is-invalid');
                        $('.errornama').html(response.error.nama);
                    } else {
                        $('#nama').removeClass('is-invalid');
                        $('.errornama').html('');
                    }
                    if (response.error.jumlah) {
                        $('#jumlah').addClass('is-invalid');
                        $('.errorjumlah').html(response.error.jumlah);
                    } else {
                        $('#jumlah').removeClass('is-invalid');
                        $('.errorjumlah').html('');
                    }
                    // if (response.error.kondisi) {
                    //     $('#kondisi').addClass('is-invalid');
                    //     $('.errorkondisi').html(response.error.kondisi);
                    // } else {
                    //     $('#kondisi').removeClass('is-invalid');
                    //     $('.errorkondisi').html('');
                    // }
                    // if (response.error.keterangan) {
                    //     $('#keterangan').addClass('is-invalid');
                    //     $('.errorketerangan').html(response.error.keterangan);
                    // } else {
                    //     $('#keterangan').removeClass('is-invalid');
                    //     $('.errorketerangan').html('');
                    // }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })
                    $('#largeModal').modal('hide');
                    // $('.add').removeAttr('disabled');
                    // $('.add').html(
                    //     '<i class="bi-plus-circle-dotted me-1"></i><span>ADD</span>');
                    datainventaris();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

        return false;
    });

    // $('.btnclose').click(function(e) {
    //     e.preventDefault();
    //     $('.add').removeAttr('disabled');
    //     $('.add').html('<i class="bi-plus-square me-1"></i><span>ADD</span>');
    // });
});
</script>