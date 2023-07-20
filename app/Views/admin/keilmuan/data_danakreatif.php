<table class="table" id="datadanakreatif">
    <thead>
        <tr>
            <th>No</th>
            <th>Pencarian Dana</th>
            <th>Nama CS</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Pendapatan</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($resultdanakreatif as $row) :
                $nomor++;
                $number = $row['pendapatan_danakreatif'];
                $format3 = "Rp" . number_format($number, 0, ",", "."); ?>

            <td><?= $nomor ?></td>
            <td><?= $row['nama_danakreatif']; ?></td>
            <td><?= $row['nama_cs']; ?></td>
            <td><?= date('d-m-Y', strtotime($row['tanggal_danakreatif'])); ?></td>
            <td><?php
                    $ket = $row['keterangan_danakeratif'];
                    if ($ket == "Lunas") : ?>
                <span class="badge badge-soft-success badge-border">Lunas</span>
                <?php else : ?>
                <span class="badge badge-soft-danger badge-border">Hutang</span>
                <?php endif; ?>
            </td>
            <td><?= $format3 ?></td>

            <td>
                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light btn-sm" title="Edit"
                    onclick="edit('<?= $row['id_danakreatif'] ?>')"><i class="ri-edit-2-line"></i></button>
                </button>

                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light btn-sm" title="Hapus"
                    onclick="hapus('<?= $row['id_danakreatif'] ?>')"><i class="ri-delete-bin-5-line"></i></button>
                </button>

                <!-- <button type="button" class="btn btn-info btn-icon waves-effect waves-light btn-sm" title="Detail"
                    onclick="detail('<?= $row['id_danakreatif'] ?>')"><i class="ri-information-line"></i></button>
                </button> -->
            </td>

        </tr>
        <?php endforeach; ?>

    </tbody>
    <tfoot>
        <tr>
            <?php
            $number = $total;
            $format2 = "Rp" . number_format($number, 0, ",", "."); ?>

            <th colspan="5" style="text-align:right">Total Pendapatan Bersih :</th>
            <th><?= $format2; ?></th>

        </tr>
    </tfoot>
</table>



<script>
function edit(id_danakreatif) {
    $.ajax({
        type: "get",
        url: "<?= base_url('keilmuan/edit_danakreatif') ?>",
        data: {
            id_danakreatif: id_danakreatif
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

function hapus(id_danakreatif) {
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
                url: "<?= base_url('keilmuan/hapus_danakreatif') ?>",
                data: {
                    id_danakreatif: id_danakreatif
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
                        datadanakreatif();
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
    $("#datadanakreatif").DataTable({
        // "responsive": true,
        "autoWidth": false,
        'columnDefs': [{
            'targets': [6], // column index (start from 0)
            'orderable': false, // set orderable false for selecte  d columns 
        }, ],

        //     footerCallback: function(row, data, start, end, display) {
        //         var api = this.api();

        //         // Remove the formatting to get integer data for summation
        //         var intVal = function(i) {
        //             return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
        //                 'number' ? i : 0;
        //         };

        //         // Total over all pages
        //         total = api
        //             .column(4)
        //             .data()
        //             .reduce(function(a, b) {
        //                 return intVal(a) + intVal(b);
        //             }, 0);

        //         // Total over this page
        //         pageTotal = api
        //             .column(4, {
        //                 page: 'current'
        //             })
        //             .data()
        //             .reduce(function(a, b) {
        //                 return intVal(a) + intVal(b);
        //             }, 0);

        //         // Update footer
        //         $(api.column(4).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
        //     },

    });

});
</script>