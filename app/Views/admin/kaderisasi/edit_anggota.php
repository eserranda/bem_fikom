<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Anggota BEM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('kaderisasi/update_anggota', ['class' => 'formupdate']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-lg-6 mb-0">
                        <label class="form-label px-1 mb-0" for="identification">Stambuk</label>
                        <input type="hidden" class="form-control" id="id_anggota" name="id_anggota"
                            value="<?= $id_anggota ?>">
                        <input type="text" class="form-control " name="stambuk" id="stambuk"
                            value="<?= $stambuk_anggota; ?>">

                        <div class="invalid-feedback errorstambuk">

                        </div>
                    </div>
                </div>

                <div class="row g-3 py-lg-1 py-2">
                    <div class="col-lg mb-0">
                        <label class="form-label px-1 mb-0 mb-0" for="identification">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama_anggota; ?>">
                        <div class="invalid-feedback errornama">

                        </div>
                    </div>

                    <div class="col-lg mb-0">
                        <label class="form-label px-1 mb-0" for="date">Jenis Kelamin</label>
                        <div class="col py-lg-2 px-1 ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                    value="laki-laki" <?php if ($gender == 'laki-laki') echo "checked"; ?>>
                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                    value="perempuan" <?php if ($gender == 'perempuan') echo "checked"; ?>>
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
                        <input type="text" class="form-control" id="email" name="email" value="<?= $email_anggota; ?>">

                    </div>

                    <!-- <div class="col-lg mb-0 mt-1 mt-lg-3">
                        <label class="form-label px-1 mb-0 ">Nama Angkatan</label>
                        <select class="form-select" name="namaangkatan" id="namaangkatan">
                            <option selected value="">- Pilih -</option>
                            <option value="Firewall">Firewall</option>
                            <option value="Overclock">Overclock</option>
                            <option value="Encryption">Encryption</option>
                        </select>
                        <div class="invalid-feedback errornamaangkatan">

                        </div>
                    </div> -->

                    <div class="col-lg mb-0 mt-1 mt-lg-3">
                        <label class="form-label px-1 mb-0 ">Nama Angkatan</label>
                        <select class="form-select" name="namaangkatan" id="namaangkatan">
                            <option value="">- Pilih -</option>
                            <?php foreach ($nama_angkatan as $row) : ?>
                            <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback errornamaangkatan">

                        </div>
                    </div>
                </div>

                <div class="row g-3 py-lg-1 py-1">

                    <div class="col-lg mb-0 mt-1 mt-lg-3">
                        <label class="form-label px-1 mb-0" for="date">Nomor Hp/Wa</label>
                        <input type="number" class="form-control" id="nomorhp" name="nomorhp"
                            value="<?= $nomor_hp_anggota; ?>">

                    </div>

                    <div class="col-lg mb-0 mt-1 mt-lg-3">
                        <label class="form-label px-1 mb-0">Status Keanggotaan</label>
                        <select class="form-select " name="status_anggota" id="status_anggota">
                            <option value="">- Pilih -</option>
                            <option value="Aktif" <?php if ($status == 'Aktif') echo "selected"; ?>>Aktif</option>
                            <option value="Dipecat" <?php if ($status == 'Dipecat') echo "selected"; ?>>
                                Dipecat</option>
                            <option value="TidakDiketahui" <?php if ($status == 'TidakDiketahui') echo "selected"; ?>>
                                TidakDiketahui</option>
                        </select>
                        <div class="invalid-feedback errorstatus">

                        </div>
                    </div>
                </div>

                <?php if ($status == 'Dipecat') { ?>
                <!-- <div class="row g-3 py-lg-1 py-1 eser" style="display: show;"> -->
                <div class="row g-3 py-lg-1 py-1">
                    <div class="col-sm-6">
                        <label for="inputPassword" class="col-sm-10 col-form-label px-1">
                            Khasus</label>
                        <div class="col-sm-12 mb-1">
                            <textarea readonly class="form-control col-6 bg-warning"><?= $keterangan; ?></textarea>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="row g-3 py-lg-1 py-1 eser" style="display: none;">
                    <!-- <div class="row g-3 py-lg-1 py-1 eser"> -->
                    <div class="col-sm-6">
                        <label for="inputPassword" class="col-sm-10 col-form-label px-1 mb-0">Alasan
                            Dipecat <sup class="text-danger">*Alasan dipecat harus diisi</sup></label>
                        <p class="fs-6 px-1 mb-0 text-danger">Isi alasan dengan Jelas</p>
                        <div class="col-sm-12 mb-1">
                            <textarea class="form-control col-6" name="keterangan"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnupdate">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading...'
                );

            },
            complete: function() {
                $('.btnupdate').removeAttr('disabled');
                $('.btnupdate').html('Save');
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
                    if (response.error.status_anggota) {
                        $('#status_anggota').addClass('is-invalid');
                        $('.errorstatus').html(response.error.status_anggota);
                    } else {
                        $('#status_anggota').removeClass('is-invalid');
                        $('.errorstatus').html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })

                    $('#largeModal').modal('hide');
                    dataanggota();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

        return false;
    });
    // jika yang dipilih "dipecat"
    $('select').on('change', function(e) {
        e.preventDefault();
        if (this.value == 'Dipecat') {
            $('.eser').show();
        } else if (this.value == 'Aktif') {
            $('.eser').hide();
            // $('.eser').append(textareavalue[0]);
        }
    });

});
</script>