<table class="table" id="datapengadaan">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Tanggal Pengadaan</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($resultdatapengadaan as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['jenis']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>

            <td>
                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light btn-sm" title="Edit"
                    onclick="edit('<?= $row['id_pengadaan_keseks'] ?>')"><i class="ri-edit-2-line"></i></button>
                </button>

                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light btn-sm" title="Hapus"
                    onclick="hapus('<?= $row['id_pengadaan_keseks'] ?>')"><i class="ri-delete-bin-5-line"></i></button>
                </button>

                <!-- <button type="button" class="btn btn-info btn-icon waves-effect waves-light btn-sm" title="Detail"
                    onclick="detail('<?= $row['id_pengadaan_keseks'] ?>')"><i class="ri-information-line"></i></button>
                </button> -->
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function edit(id_pengadaan_keseks) {
    $.ajax({
        type: "get",
        url: "<?= base_url('kesekretariatan/edit_pengadaan') ?>",
        data: {
            id_pengadaan_keseks: id_pengadaan_keseks
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#myModal').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

function hapus(id_pengadaan_keseks) {
    Swal.fire({
        html: '<div class="mt-3">' +
            '<lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
            '<div class="mt-1 pt-2 fs-15 mx-5">' +
            '<h4>Hapus Data ?</h4>' +
            '<p class="text-muted mx-4 mb-0">Apakah Anda Yakin ingin Menghapus Data ini?</p>' +
            '</div>' +
            '</div>',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-danger w-xs me-2 mb-1',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonClass: 'btn btn-primary w-xs mb-1',
        cancelButtonText: 'Batal',
        buttonsStyling: false,
        showCloseButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?= base_url('kesekretariatan/hapus_pengadaan') ?>",
                data: {
                    id_pengadaan_keseks: id_pengadaan_keseks
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            title: 'Terhapus !',
                            text: 'Data berhasil di hapus.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            showCloseButton: true,
                        })
                        datapengadaan();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    })
}


$(function() {
    $("#datapengadaan").DataTable({
        "responsive": true,
        "autoWidth": false,
        'columnDefs': [{
            'targets': [5], // column index (start from 0)
            'orderable': false, // set orderable false for selecte  d columns 
        }, ],

    })

});
</script>