<div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Tambah Data Kegiatan Humas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <?= form_open('humas/save_kegiatan', ['class' => 'formadd']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row mb-2">
                            <input type="hidden" id="taskid-input" class="form-control">
                            <div class="mb-2 col-lg-12">
                                <label for="task-title-input" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                                <div class="invalid-feedback errornamakegiatan">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <input type="hidden" id="taskid-input" class="form-control">
                            <div class="mb-2 col-lg-12">
                                <label for="task-title-input" class="form-label">Jenis Kegiatan</label>
                                <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                                <div class="invalid-feedback errorjeniskegiatan">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <input type="hidden" id="taskid-input" class="form-control">
                            <div class="mb-2 col-lg-12">
                                <label for="task-title-input" class="form-label">Tempat Kegiatan</label>
                                <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan">
                                <div class="invalid-feedback errortempat_kegiatan">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <input type="hidden" id="taskid-input" class="form-control">
                            <div class="mb-2 col-lg-12">
                                <label for="task-title-input" class="form-label">Tanggal Kegiatan</label>
                                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan">
                                <div class="invalid-feedback errortanggalkegiatan">

                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="loop"
                            style="width:250px;height:250px">
                        </lord-icon>
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
        </div>
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
                    if (response.error.nama_kegiatan) {
                        $('#nama_kegiatan').addClass('is-invalid');
                        $('.errornamakegiatan').html(response.error.nama_kegiatan);
                    } else {
                        $('#nama_kegiatan').removeClass('is-invalid');
                        $('.errornamakegiatan').html('');
                    }

                    if (response.error.jenis_kegiatan) {
                        $('#jenis_kegiatan').addClass('is-invalid');
                        $('.errorjeniskegiatan').html(response.error.jenis_kegiatan);
                    } else {
                        $('#jenis_kegiatan').removeClass('is-invalid');
                        $('.errorjeniskegiatan').html('');
                    }

                    if (response.error.tempat_kegiatan) {
                        $('#tempat_kegiatan').addClass('is-invalid');
                        $('.errortempat_kegiatan').html(response.error.tempat_kegiatan);
                    } else {
                        $('#tempat_kegiatan').removeClass('is-invalid');
                        $('.errortempat_kegiatan').html('');
                    }

                    if (response.error.tanggal_kegiatan) {
                        $('#tanggal_kegiatan').addClass('is-invalid');
                        $('.errortanggalkegiatan').html(response.error.tanggal_kegiatan);
                    } else {
                        $('#tanggal_kegiatan').removeClass('is-invalid');
                        $('.errortanggalkegiatan').html('');
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
                    datakegiatan();
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