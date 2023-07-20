<table class="table" id="datapeminjaman">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Nama Barang</th>
            <th>Tgl Peminjaman</th>
            <th>Jangka Waktu</th>
            <th>Tgl Pengembalian</th>
            <th>Keterangan</th>
            <th></th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($resultdatapeminjaman as $row) :
                $nomor++; ?>
            <th><?= $nomor ?></th>
            <td><?= $row['nama_peminjam']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= date('d-m-Y', strtotime($row['tanggal_peminjaman'])); ?></td>
            <td><?= $row['jangka_waktu']; ?> Hari</td>
            <td><?php
                    $tglpengembalianbrg = $row['tanggal_pengembalian'];
                    if ($tglpengembalianbrg == "") :
                    ?>
                <span class="badge badge-soft-warning text-danger">BELUM DIKEMBALIKAN</span>
                <?php else : ?>
                <?= date('d-m-Y', strtotime($row['tanggal_pengembalian'])); ?>
                <?php endif; ?>
            </td>
            <!-- <td><?= $row['keterangan']; ?></td> -->
            <td>
                <?php
                    $keterangan = $row['keterangan'];
                    $tgl = $row['tanggal_pengembalian'];
                    if ($tgl == '') : ?>

                <?php elseif ($keterangan == '') : ?>
                Bagus
                <?php else : ?>
                <?= $row['keterangan']; ?>
                <?php endif; ?>
            </td>
            <td>
                <?php
                    $tglpengembalian = $row['tanggal_pengembalian'];
                    if ($tglpengembalian != "") :
                        $row['tanggal_pengembalian']; ?>
                <?php else : ?>
                <button type="button" class="btn btn-success text-light waves-effect waves-light btn-sm"
                    title="Kembalikan" onclick="editpeminjaman('<?= $row['id_peminjaman'] ?>')"><i
                        class="ri-check-double-line label-icon align-middle rounded-pill fs-10 me-2"></i></button>
                </button>

                <?php endif; ?>
            </td>

            <td class="text-center">
                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light btn-sm" title="Hapus"
                    onclick="hapuspeminjam('<?= $row['id_peminjaman'] ?>')"><i
                        class="ri-delete-bin-5-line"></i></button>
                </button>

            </td>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function editpeminjaman(id_peminjaman) {
    $.ajax({
        type: "get",
        url: "<?= base_url('kesekretariatan/editpeminjaman') ?>",
        data: {
            id_peminjaman: id_peminjaman
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

function hapuspeminjam(id_peminjaman) {
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
                url: "<?= base_url('kesekretariatan/hapuspeminjam') ?>",
                data: {
                    id_peminjaman: id_peminjaman
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
                        datapeminjam();
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
    $("#datapeminjaman").DataTable({
        "responsive": true,
        "autoWidth": false,
        'columnDefs': [{
            'targets': [7, 8], // column index (start from 0)
            'orderable': false, // set orderable false for selecte  d columns 
        }, ],

    })

});
</script>