<table class="table" id="pemasukan_keuangan">
    <thead>
        <tr>
            <th>No</th>
            <th>Keterangan</th>
            <th>Kw/Nota</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Saldo</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($bendahara as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['keterangan']; ?></td>
            <td><?= $row['tanda_terima']; ?></td>
            <td><?= $row['debet']; ?></td>
            <td><?= $row['kredit']; ?></td>
            <td><?= $row['saldo']; ?></td>
            <td>
                <div class="hstack gap-1">
                    <button type="button" class="btn btn-primary btn-icon waves-effect waves-light btn-sm" title="Edit"
                        onclick="edit('<?= $row['id_bendahara'] ?>')"><i class="ri-edit-2-line"></i></button>
                    </button>

                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light btn-sm" title="Hapus"
                        onclick="hapus('<?= $row['id_bendahara'] ?>')"><i class="ri-delete-bin-5-line"></i></button>
                    </button>
                </div>
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>