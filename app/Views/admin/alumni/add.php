<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Alumi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('alumni/saveitems', ['class' => 'formadd']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-lg-6 mb-0">
                        <label class="form-label px-1 mb-0" for="identification">Stambuk</label>
                        <input type="text" class="form-control " name="stambuk" id="stambuk">

                        <div class="invalid-feedback errorstambuk">

                        </div>
                    </div>
                </div>

                <div class="row g-3 py-lg-1 py-2">
                    <div class="col-lg mb-0">
                        <label class="form-label px-1 mb-0 mb-0" for="identification">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="invalid-feedback errornama">

                        </div>
                    </div>

                    <div class="col-lg mb-0">
                        <label class="form-label px-1 mb-0" for="date">Jenis Kelamin</label>
                        <div class="col py-lg-2 px-1 ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                    value="laki-laki">
                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                    value="perempuan">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>
                        <!-- <div class="invalid-feedback errorgender">

                        </div> -->
                    </div>
                </div>

                <div class="row g-3 py-lg-1 py-1">
                    <div class="col-lg mb-0">
                        <label class="form-label px-lg-1 mb-0" for="identification">Email</label>
                        <input type="text" class="form-control" id="email" name="email">

                    </div>

                    <div class="col-lg mb-0 mt-1 mt-lg-3">
                        <label class="form-label px-1 mb-0 ">Nama Angkatan</label>
                        <select class="form-select" name="namaangkatan" id="namaangkatan">
                            <option selected value="">- Pilih -</option>
                            <option value="Firewall">Firewall</option>
                            <option value="Overclock">Overclock</option>
                            <option value="Encryption">Encryption</option>
                        </select>
                        <div class="invalid-feedback errornamaangkatan">

                        </div>
                    </div>
                </div>

                <div class="row g-3 py-lg-1 py-1">
                    <div class="col-lg mb-0">
                        <label class="form-label px-1 mb-0" for="identification">Alumni Thn</label>
                        <input type="number" class="form-control" name="alumnitahun" id="alumnitahun">
                        <div class="invalid-feedback erroralumnitahun">

                        </div>
                    </div>
                    <div class="col-lg mb-0 mt-1 mt-lg-3">
                        <label class="form-label px-1 mb-0" for="date">Nomor Hp</label>
                        <input type="text" class="form-control" id="nomorhp" name="nomorhp">

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsave">Simpan</button>
                <button type="button" class="btn btn-secondary btnclose" data-bs-dismiss="modal">Close</button>
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
                    if (response.error.stambuk) {
                        $('#stambuk').addClass('is-invalid');
                        $('.errorstambuk').html(response.error.stambuk);
                    } else {
                        $('#stambuk').removeClass('is-invalid');
                        $('.errorstambuk').html('');
                    }
                    if (response.error.nama) {
                        $('#nama').addClass('is-invalid');
                        $('.errornama').html(response.error.nama);
                    } else {
                        $('#nama').removeClass('is-invalid');
                        $('.errornama').html('');
                    }
                    if (response.error.gender) {
                        $('#inlineRadio1').addClass('is-invalid');
                        $('.errorgender').html(response.error.gender);
                    } else {
                        $('#inlineRadio1').removeClass('is-invalid');
                        $('.errorgender').html('');
                    }
                    if (response.error.gender) {
                        $('#inlineRadio2').addClass('is-invalid');
                        $('.errorgender').html(response.error.gender);
                    } else {
                        $('#inlineRadio2').removeClass('is-invalid');
                        $('.errorgender').html('');
                    }
                    if (response.error.namaangkatan) {
                        $('#namaangkatan').addClass('is-invalid');
                        $('.errornamaangkatan').html(response.error.namaangkatan);
                    } else {
                        $('#namaangkatan').removeClass('is-invalid');
                        $('.errornamaangkatan').html('');
                    }
                    if (response.error.alumnitahun) {
                        $('#alumnitahun').addClass('is-invalid');
                        $('.erroralumnitahun').html(response.error.alumnitahun);
                    } else {
                        $('#alumnitahun').removeClass('is-invalid');
                        $('.erroralumnitahun').html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })
                    $('#largeModal').modal('hide');
                    $('.add').removeAttr('disabled');
                    $('.add').html('<i class="bi-plus-square me-1"></i><span>ADD</span>');
                    dataalumni();
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