<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">

            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Input Data Ibadah Bulanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <?= form_open('kerohanian/save_ibadah', ['class' => 'formadd'])  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <input type="hidden" id="taskid-input" class="form-control">
                            <div class="mb-2 col-lg-12">
                                <label for="task-title-input" class="form-label">Tanggal Ibadah</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                                <div class="invalid-feedback errortanggal">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <input type="hidden" id="taskid-input" class="form-control">
                            <div class="mb-2 col-lg-12">
                                <label for="task-title-input" class="form-label">Tempat Ibdah</label>
                                <input type="text" class="form-control" id="tempat" name="tempat">
                                <div class="invalid-feedback errortempat">

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
                    if (response.error.tanggal) {
                        $('#tanggal').addClass('is-invalid');
                        $('.errortanggal').html(response.error.tanggal);
                    } else {
                        $('#tanggal').removeClass('is-invalid');
                        $('.errortanggal').html('');
                    }

                    if (response.error.tempat) {
                        $('#tempat').addClass('is-invalid');
                        $('.errortempat').html(response.error.tempat);
                    } else {
                        $('#tempat').removeClass('is-invalid');
                        $('.errortempat').html('');
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
                    dataibadah();
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