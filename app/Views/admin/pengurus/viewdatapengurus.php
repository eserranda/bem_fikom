<?= $this->extend('admin/index'); ?>

<?= $this->section('head_title'); ?>
<link href="<?= base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<?php echo view('partials/title-meta', array('title' => 'Team')); ?>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>

<?php echo view('partials/page-title', array('pagetitle' => 'Pages', 'title' => 'Data Pengurus')); ?>

<div class="viewdata">

</div>


<div class="viewmodal" style="display: none;"></div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



<script>
function datapengurus() {
    $.ajax({
        url: "<?= base_url('pengurus/getdatapengurus') ?>",
        dataType: "json",
        success: function(response) {
            $('.viewdata').html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

$(document).ready(function() {
    datapengurus()
    $('.add').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('pengurus/formtambah_pengurus') ?>",
            dataType: "json",

            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#exampleModalgrid').modal('show');

            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
});
</script>
<?= $this->endSection(); ?>