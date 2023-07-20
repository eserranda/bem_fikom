<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Input Data Arsip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <?= form_open('keilmuan/save_arsip', ['class' => 'formadd'])  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row mb-2">
                            <input type="hidden" id="taskid-input" class="form-control">
                            <div class="mb-2 col-lg-12">
                                <label for="task-title-input" class="form-label">Nama Arsip</label>
                                <input type="text" class="form-control" id="nama_arsip" name="nama_arsip">
                                <div class="invalid-feedback errornamaarsip">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="task-title-input" class="form-label">Kondisi Arsip</label>
                            <div class="mb-2 col-lg-12">
                                <select class="form-select" id="kondisi_arsip" name="kondisi_arsip">
                                    <option value="">Pilih Kondisi</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                                <div class="invalid-feedback errorkondisiarsip">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="task-title-input" class="form-label">Keterangan Arsip</label>
                            <div class="mb-2 col-lg-12">
                                <select class="form-select" id="keterangan_arsip" name="keterangan_arsip">
                                    <option value="">Pilih Keterangan</option>
                                    <option value="Baru">Baru</option>
                                    <option value="Lama">Lama</option>
                                </select>
                                <div class="invalid-feedback errorketeranganarsip">

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
                    if (response.error.nama_arsip) {
                        $('#nama_arsip').addClass('is-invalid');
                        $('.errornamaarsip').html(response.error.nama_arsip);
                    } else {
                        $('#nama_arsip').removeClass('is-invalid');
                        $('.errornamaarsip').html('');
                    }

                    if (response.error.kondisi_arsip) {
                        $('#kondisi_arsip').addClass('is-invalid');
                        $('.errorkondisiarsip').html(response.error.kondisi_arsip);
                    } else {
                        $('#kondisi_arsip').removeClass('is-invalid');
                        $('.errorkondisiarsip').html('');
                    }

                    if (response.error.keterangan_arsip) {
                        $('#keterangan_arsip').addClass('is-invalid');
                        $('.errorketeranganarsip').html(response.error.keterangan_arsip);
                    } else {
                        $('#keterangan_arsip').removeClass('is-invalid');
                        $('.errorketeranganarsip').html('');
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
                    dataarsip();
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