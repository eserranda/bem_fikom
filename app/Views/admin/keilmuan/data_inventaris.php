<table class="table" id="datainventaris">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Brg</th>
            <th>Nama Brg</th>
            <th>Jumlah</th>
            <th>Rusak</th>
            <th>Kondisi</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($resultdataworkshop as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['jenis_barang']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['jumlah_barang']; ?></td>
            <td><?= $row['barang_rusak']; ?></td>
            <td><?= $row['kondisi_lama']; ?> Lama, <?= $row['kondisi_baru']; ?> Baru </td>
            <td><?= $row['status']; ?></td>

            <td>

                <div class="dropdown d-inline-block">
                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-more-fill align-middle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li><a href="#!" class="dropdown-item edit-item-btn"
                                onclick="edit('<?= $row['id_workshop'] ?>')">
                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>

                        <li class="dropdown-divider"></li>
                        <li><a href="#!" class="dropdown-item remove-item-btn"
                                onclick="hapus('<?= $row['id_workshop'] ?>')">
                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                Hapus</a></li>

                    </ul>
                </div>

            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>

    <script>
    function edit(id_workshop) {
        $.ajax({
            type: "get",
            url: "<?= base_url('keilmuan/edit_inventaris') ?>",
            data: {
                id_workshop: id_workshop
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#largeModal').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus(id_workshop) {
        Swal.fire({
            title: 'Hapus Data?',
            // text: "Yakin menghapus data ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('keilmuan/hapus_inventaris') ?>",
                    data: {
                        id_workshop: id_workshop
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire(
                                'Deleted!',
                                'Data berhasil dihapus!',
                                'success'
                            )
                            datainventaris_workshop();
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
        $("#datainventaris").DataTable({
            "responsive": true,
            "autoWidth": false,
        })

    });
    </script>