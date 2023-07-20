<table class="table" id="pemasukan_keuangan">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Bulan</th>
            <th>Jumlah Uang</th>
            <th>Keterangan</th>
            <th>Denda</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 1;
            foreach ($iuran as $row) : ?>
            <td><?= $nomor++ ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['bulan']; ?></td>
            <td>
                <?php $number = $row['jumlah_uang']; ?>
                <?= $number != '' ? $format3 = "Rp" . number_format($number, 0, ",", ".") : '-';  ?>
            </td>
            <td>
                <?php $pendapatan = $row['keterangan'] ?>
                <?= $pendapatan == 'Lunas' ? '<span class="badge badge-outline-success">Lunas</span>' : '<span class="badge badge-outline-danger">Denda</span>' ?>
            </td>
            <td>
                <?php $pendapatan = $row['denda'] ?>
                <?= $pendapatan != '' ? $rp = "Rp" . number_format($pendapatan, 0, ",", ".") : '-'; ?>
            <td>
                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light btn-sm" title="Edit"
                    onclick="edit('<?= $row['id_iuran'] ?>')"><i class="ri-edit-2-line"></i></button>
                </button>

                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light btn-sm" title="Hapus"
                    onclick="hapus('<?= $row['id_iuran'] ?>')"><i class="ri-delete-bin-5-line"></i></button>
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function edit(id_iuran) {
    $.ajax({
        type: "get",
        url: "<?= base_url('keuangan/edit_iuran') ?>",
        data: {
            id_iuran: id_iuran
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#exampleModalgrid').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

function hapus(id_iuran) {
    Swal.fire({
        html: '<div class="mt-3">' +
            '<lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
            '<div class="mt-1 pt-2 fs-15 mx-5">' +
            '<h4>Hapus Data ?</h4>' +
            '<p class="text-muted mx-4 mb-0">Apakah anda yakin ingin menghapus data ini?</p>' +
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
                url: "<?= base_url('keuangan/hapus_iuran') ?>",
                data: {
                    id_iuran: id_iuran
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            title: 'Terhapus !',
                            text: 'Data berhasil dihapus!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            showCloseButton: true,
                        })

                        databasar();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    })
}

$(function() {
    $("#pemasukan_keuangan").DataTable({
        "responsive": true,
        "autoWidth": false,
        'columnDefs': [{
            'targets': [5], // column index (start from 0)
            'orderable': false, // set orderable false for selecte  d columns 
        }, ],
    })
});
</script>