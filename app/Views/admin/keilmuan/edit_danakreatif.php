<div class="modal fade" id="myModal" tabindex="-1">
    <!-- <div class="modal-dialog modal-lg"> -->
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Create A New Joob</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <?= form_open('keilmuan/update_danakreatif', ['class' => 'formupdate']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <input type="hidden" id="taskid-input" class="form-control">
                            <div class="mb-2 col-lg-12">
                                <label for="task-title-input" class="form-label">Pencarian Dana</label>
                                <input type="hidden" class="form-control" id="id_danakreatif" name="id_danakreatif"
                                    value="<?= $id_danakreatif; ?>">
                                <input type="text" class="form-control" id="nama_pencariandana"
                                    name="nama_pencariandana" value="<?= $nama_danakreatif; ?>">
                                <div class="invalid-feedback errornama_pencariandana">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <input type="hidden" id="taskid-input" class="form-control">
                            <div class="mb-2 col-lg-12">
                                <label for="task-title-input" class="form-label">Nama Customers</label>
                                <input type="text" class="form-control" id="nama_cs" name="nama_cs"
                                    value="<?= $nama_cs; ?>">
                                <div class="invalid-feedback errornama_cs">

                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-2">
                            <div class="col-lg-6">
                                <label for="task-duedate-input" class="form-label">Tanggal</label>
                                <input type="date" id="tanggal" class="form-control" name="tanggal"
                                    value="<?= $tanggal_danakreatif; ?>">
                                <div class="invalid-feedback errortanggal">

                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <label for="task-duedate-input" class="form-label">Total Bayar</label>
                                <div class="input-group">
                                    <span class="input-group-text" name="hari">Rp</span>
                                    <input type="number" class="form-control" name="total_bayar" id="total_bayar"
                                        value="<?= $pendapatan_danakreatif; ?>">

                                    <div class="invalid-feedback errortotal_bayar">

                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>

                        <div class="row mb-2">
                            <label for="task-title-input" class="form-label">Keterangan</label>
                            <div class="mb-2 col-lg-12">
                                <select class="form-select" id="keterangan" name="keterangan">
                                    <option value="">Pilih Keterangan</option>
                                    <option value="Lunas"
                                        <?php if ($keterangan_danakeratif == 'Lunas') echo "selected" ?>>Lunas</option>
                                    <option value="Hutang"
                                        <?php if ($keterangan_danakeratif == 'Hutang') echo "selected" ?>>Hutang
                                    </option>
                                </select>
                                <div class="invalid-feedback errorketerangan">

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i
                            class="ri-close-fill align-bottom"></i> Close</button>
                    <button type="submit" class="btn btn-primary btnsave" id="addNewTodo">Update</button>
                </div>
            </div>
            <?= form_close() ?>
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
                    if (response.error.nama_pencariandana) {
                        $('#nama_pencariandana').addClass('is-invalid');
                        $('.errornama_pencariandana').html(response.error
                            .nama_pencariandana);
                    } else {
                        $('#nama_pencariandana').removeClass('is-invalid');
                        $('.errornama_pencariandana').html('');
                    }

                    if (response.error.nama_cs) {
                        $('#nama_cs').addClass('is-invalid');
                        $('.errornama_cs').html(response.error.nama_cs);
                    } else {
                        $('#nama_cs').removeClass('is-invalid');
                        $('.errornama_cs').html('');
                    }

                    if (response.error.tanggal) {
                        $('#tanggal').addClass('is-invalid');
                        $('.errortanggal').html(response.error.tanggal);
                    } else {
                        $('#tanggal').removeClass('is-invalid');
                        $('.errortanggal').html('');
                    }

                    if (response.error.total_bayar) {
                        $('#total_bayar').addClass('is-invalid');
                        $('.errortotal_bayar').html(response.error.total_bayar);
                    } else {
                        $('#total_bayar').removeClass('is-invalid');
                        $('.errortotal_bayar').html('');
                    }
                    if (response.error.keterangan) {
                        $('#keterangan').addClass('is-invalid');
                        $('.errorketerangan').html(response.error.keterangan);
                    } else {
                        $('#keterangan').removeClass('is-invalid');
                        $('.errorketerangan').html('');
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
                    $('.add').removeAttr('disabled');
                    $('.add').html(
                        '<i class="bi-plus-circle-dotted me-1"></i><span>ADD</span>');
                    datadanakreatif();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

        return false;
    });

    $('.btnclose').click(function(e) {
        e.preventDefault();
        $('.add').removeAttr('disabled');
        $('.add').html('<i class="bi-plus-square me-1"></i><span>ADD</span>');
    });
});
</script>