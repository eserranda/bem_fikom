<table class="table dt-responsive nowrap table-striped align-middle" style="width:100%" id="dataanggota">
    <thead>
        <tr>
            <th>No</th>
            <th>Stambuk</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Angkatan</th>
            <th class="text-center">Status</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($resultdataanggota as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['stambuk_anggota']; ?></td>
            <td><?= $row['nama_anggota']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><?= $row['nama_angkatan_anggota']; ?></td>
            <td class="text-center">
                <?php
                    $status  = $row['status'];

                    if ($status == "Aktif") {
                    ?>
                <span class="badge text-bg-success">Aktif</span>
                <?php } ?>

                <?php
                    $status  = $row['status'];

                    if ($status == "Dipecat") {
                    ?>
                <span class="badge text-bg-danger"></i>Dipecat</span>
                <?php } ?>
                <?php
                    $status  = $row['status'];

                    if ($status == "TidakDiketahui") {
                    ?>
                <span class="badge bg-warning text-dark">Tanpa Keterangan</span>
                <?php } ?>
            </td>
            <td>

                <div class="dropdown d-inline-block">
                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-more-fill align-middle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="#!" class="dropdown-item" onclick="detail('<?= $row['id_anggota'] ?>')">
                                <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                Detail</a></li>

                        <!-- <li><a href="#!" class="dropdown-item edit-item-btn"
                                onclick="edit('<?= $row['id_anggota'] ?>')">
                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li> -->
                        <li class="dropdown-divider"></li>
                        <li><a href="#!" class="dropdown-item remove-item-btn"
                                onclick="hapus('<?= $row['id_anggota'] ?>')">
                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                Hapus</a></li>
                    </ul>
                </div>

            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function edit(id_anggota) {
    $.ajax({
        type: "get",
        url: "<?= base_url('kaderisasi/edit_anggota') ?>",
        data: {
            id_anggota: id_anggota
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

function hapus(id_anggota) {
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
        buttonsStyling: false,
        showCloseButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?= base_url('kaderisasi/hapus_anggota') ?>",
                data: {
                    id_anggota: id_anggota
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            title: 'Terhapus !',
                            text: 'Data berhasil di hapus.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                            showCloseButton: true,
                        })
                        dataanggota();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    })
}

function detail(id_anggota) {
    $.ajax({
        type: "get",
        url: "<?= base_url('kaderisasi/detail_anggota') ?>",
        data: {
            id_anggota: id_anggota
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

$(document).ready(function() {
    $('#dataanggota').DataTable({
        "responsive": true,
        "autoWidth": false,
        'columnDefs': [{
                'targets': [6], // column index (start from 0)
                'orderable': false, // set orderable false for selecte  d columns 
            },
            // {
            //     targets: [4], //hide colom
            //     visible: false,
            //     searchable: false,
            // },
        ],
        dom: "<'row'<'col-lg-3 mb-1'l> <'col-lg-4 mb-1'B> <'col-lg-5'f>>" +
            "<'row'<'col-sm-12 py-lg-2'tr>>" +
            "<'row'<'col-sm-12 col-lg-5'i><'col-sm-12 col-lg-7'p>>",
        buttons: [{
                extend: 'excelHtml5',
                text: 'Excel',

                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'print',
                text: 'Print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'csvHtml5',
                text: 'CSV',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
        ]
    })
});
</script>