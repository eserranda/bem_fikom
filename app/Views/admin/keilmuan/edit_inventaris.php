<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Inventaris</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('keilmuan/update_inventaris', ['class' => 'formupdate']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="inputNanme4" class="form-label">Jenis Barang</label>
                        <input type="hidden" class="form-control" id="id_workshop" name="id_workshop"
                            value="<?= $id_workshop; ?>">
                        <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $jenis_barang; ?>">
                        <div class="invalid-feedback errorjenis">

                        </div>
                    </div>

                    <div class="col-sm-6 ">
                        <label for="inputNanme4" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama_barang; ?>">
                        <div class="invalid-feedback errornama">

                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-sm-6 mt-1">
                        <label for="inputEmail4" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                            value="<?= $jumlah_barang; ?>">
                        <div class="invalid-feedback errorjumlah">

                        </div>
                    </div>

                    <div class="col-sm-6 mt-1">
                        <label for="inputEmail4" class="form-label">Rusak</label>
                        <input type="number" class="form-control" id="rusak" name="rusak" value="<?= $barang_rusak; ?>">
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class=" col-sm-6 mt-1">
                        <label for="form-select" class="form-label">Kondisi</label>
                        <div class="row">
                            <div class="col-lg-6 mb-1">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Lama" name="lama"
                                        value="<?= $kondisi_lama; ?>">
                                    <span class="input-group-text">Lama</span>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-1">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Baru" name="baru"
                                        value="<?= $kondisi_baru; ?>">
                                    <span class="input-group-text">Baru</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-1">
                        <label for="task-title-input" class="form-label">Status Barang</label>
                        <div class="mb-2 col-lg-12">
                            <select class="form-select" id="status_barang" name="status_barang">
                                <option value="Ada" <?php if ($status == 'Ada') echo "selected"; ?>>Ada</option>
                                <option value="Hilang" <?php if ($status == 'Hilang') echo "selected"; ?>>Hilang
                                </option>
                                <option value="Dipinjam" <?php if ($status == 'Dipinjam') echo "selected"; ?>>Dipinjam
                                </option>
                            </select>
                            <div class="invalid-feedback errorstatusbarang">

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnupdate">Update</button>
                <button type="button" class="btn btn-secondary btnclose" data-bs-dismiss="modal">Batal</button>
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
                $('.btnupdate').attr('disable', 'disabled');
                $('.btnupdate').html(
                    '<i class="spinner-border spinner-border-sm text-secondary" role="status"></i>'
                );
            },
            complete: function() {
                $('.btnupdate').removeAttr('disabled');
                $('.btnupdate').html('Save');
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

                    if (response.error.kondisi) {
                        $('#kondisi').addClass('is-invalid');
                        $('.errorkondisi').html(response.error.kondisi);
                    } else {
                        $('#kondisi').removeClass('is-invalid');
                        $('.errorkondisi').html('');
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
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })
                    $('#largeModal').modal('hide');
                    $('.add').removeAttr('disabled');
                    $('.add').html(
                        '<i class="bi-plus-circle-dotted me-1"></i><span>ADD</span>');
                    datainventaris_workshop();
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
        $('.add').html('<i class="bi-plus-circle-dotted me-1"></i><span>ADD</span>');
    });
});
</script>