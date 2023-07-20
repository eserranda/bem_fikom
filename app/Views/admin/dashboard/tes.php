<?php foreach ($ketua as $row) : ?>

<li><?= $row->fullname ?></li>
<li><?= $row->jabatan ?></li>
<li><?= $row->username ?></li>
<li><?= $row->email ?></li>

<?php endforeach ?>
<br>
<?php foreach ($bendahara as $row) : ?>
<li><?= $row->fullname ?></li>
<li><?= $row->jabatan ?></li>
<li><?= $row->username ?></li>
<li><?= $row->email ?></li>
<?php endforeach ?>
<br>
<?php foreach ($sekretaris as $row) : ?>
<li><?= $row->fullname ?></li>
<li><?= $row->jabatan ?></li>
<li><?= $row->username ?></li>
<li><?= $row->email ?></li>
<?php endforeach ?>