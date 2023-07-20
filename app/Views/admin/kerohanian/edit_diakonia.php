<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Input Data Diakonia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <?= form_open('kerohanian/update_diakonia', ['class' => 'formupdate'])  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <label for="task-duedate-input" class="form-label">Kunjungan Ke</label>
                        <input type="hidden" id="id_diakonia" class="form-control" name="id_diakonia"
                            value="<?= $id_diakonia; ?>">
                        <input type="text" id="nama_kunjungan" class="form-control" name="nama_kunjungan"
                            value="<?= $nama_kunjungan; ?>">
                        <div class="invalid-feedback errornama_kunjungan">

                        </div>
                    </div>

                    <!--end col-->
                    <div class="col-lg-6">
                        <label for="task-duedate-input" class="form-label">Tanggal</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan"
                                value="<?= $tanggal_kunjungan; ?>">
                            <div class="invalid-feedback errortanggal_kunjungan">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>

                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <label for="task-duedate-input" class="form-label">Tempat</label>
                        <input type="text" id="tempat_kunjungan" class="form-control" name="tempat_kunjungan"
                            value="<?= $tempat_kunjungan; ?>">
                        <div class="invalid-feedback errortempat_kunjungan">

                        </div>
                    </div>

                    <!--end col-->
                    <div class="col-lg-6">
                        <label for="task-title-input" class="form-label">Keterangan</label>
                        <div class="mb-2 col-lg-12">
                            <select class="form-select" id="keterangan_kunjungan" name="keterangan_kunjungan">
                                <option value="">Pilih Keterangan</option>
                                <option value="Sakit" <?php if ($keterangan_kunjungan == 'Sakit') echo "selected"; ?>>
                                    Sakit</option>
                                <option value="Pernikahan"
                                    <?php if ($keterangan_kunjungan == 'Pernikahan') echo "selected"; ?>>
                                    Pernikahan</option>
                                <option value="Kedukaan"
                                    <?php if ($keterangan_kunjungan == 'Kedukaan') echo "selected"; ?>>Kedukaan
                                </option>
                                <option value="Lain-lain"
                                    <?php if ($keterangan_kunjungan == 'Lain-lain') echo "selected"; ?>>Lain-lain
                                </option>
                            </select>
                            <div class="invalid-feedback errorketerangan_kunjungan">

                            </div>
                        </div>
                    </div>

                    <!--end col-->
                </div>

                <div class="mb-2">
                    <label for="task-title-input" class="form-label">Pengeluaran</label>
                    <div class="input-group">
                        <span class="input-group-text" name="hari">Rp</span>
                        <input type="number" class="form-control" name="pengeluaran_kunjungan"
                            id="pengeluaran_kunjungan" value="<?= $pengeluaran_kunjungan; ?>">

                        <div class="invalid-feedback errorpengeluaran_kunjungan">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i
                            class="ri-close-fill align-bottom"></i> Close</button>
                    <button type="submit" class="btn btn-primary btnsave" id="addNewTodo">Simpan</button>
                </div>
            </div>
            <?= form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                    if (response.error.nama_kunjungan) {
                        $('#nama_kunjungan').addClass('is-invalid');
                        $('.errornama_kunjungan').html(response.error.nama_kunjungan);
                    } else {
                        $('#nama_kunjungan').removeClass('is-invalid');
                        $('.errornama_kunjungan').html('');
                    }

                    if (response.error.tanggal_kunjungan) {
                        $('#tanggal_kunjungan').addClass('is-invalid');
                        $('.errortanggal_kunjungan').html(response.error.tanggal_kunjungan);
                    } else {
                        $('#tanggal_kunjungan').removeClass('is-invalid');
                        $('.errortanggal_kunjungan').html('');
                    }

                    if (response.error.tempat_kunjungan) {
                        $('#tempat_kunjungan').addClass('is-invalid');
                        $('.errortempat_kunjungan').html(response.error.tempat_kunjungan);
                    } else {
                        $('#tempat_kunjungan').removeClass('is-invalid');
                        $('.errortempat_kunjungan').html('');
                    }

                    if (response.error.keterangan_kunjungan) {
                        $('#keterangan_kunjungan').addClass('is-invalid');
                        $('.errorketerangan_kunjungan').html(response.error
                            .keterangan_kunjungan);
                    } else {
                        $('#keterangan_kunjungan').removeClass('is-invalid');
                        $('.errorketerangan_kunjungan').html('');
                    }
                    if (response.error.pengeluaran_kunjungan) {
                        $('#pengeluaran_kunjungan').addClass('is-invalid');
                        $('.errorpengeluaran_kunjungan').html(response.error
                            .pengeluaran_kunjungan);
                    } else {
                        $('#pengeluaran_kunjungan').removeClass('is-invalid');
                        $('.errorpengeluaran_kunjungan').html('');
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
                    $('#myModal').modal('hide');
                    datadiakonia();
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