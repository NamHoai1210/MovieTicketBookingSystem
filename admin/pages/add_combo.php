<?php
include('header.php');
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css" />

<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
<!-- =============================================== -->

<?php
include('../../form.php');
$frm = new formBuilder;
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Combo
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Add Combo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <?php include('../../msgbox.php'); ?>
                <form action="process_add_combo.php" method="post" enctype="multipart/form-data" id="form1">
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea name="desc" class="form-control"></textarea>
                        <?php $frm->validate("desc", array("required", "label" => "Description")); // Validating form using form builder written in form.php 
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Start Date</label>
                        <input type="date" name="sdate" class="form-control" />
                        <?php $frm->validate("rdate", array("required", "label" => "Start Date")); // Validating form using form builder written in form.php 
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">End Date</label>
                        <input type="date" name="edate" class="form-control" />
                        <?php $frm->validate("rdate", array("required", "label" => "End Date")); // Validating form using form builder written in form.php 
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Week Date</label>
                        <input type="number" name="wdate" class="form-control" />
                        <?php $frm->validate("wdate", array("required", "label" => "Week Date")); // Validating form using form builder written in form.php 
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <input type="file" name="image" class="form-control" />
                        <?php $frm->validate("image", array("required", "label" => "Image")); // Validating form using form builder written in form.php 
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Amount</label>
                        <input type="number" name="amount" class="form-control" />
                        <?php $frm->validate("length", array("required", "label" => "Amount")); // Validating form using form builder written in form.php 
                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Combo</button>
                    </div>
                </form>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<?php
include('footer.php');
?>
<script>
    <?php $frm->applyvalidations("form1"); ?>
</script>