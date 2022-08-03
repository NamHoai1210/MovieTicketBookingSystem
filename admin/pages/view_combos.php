<?php
include('header.php');
?>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Combos
            <a href="add_combo.php"> <button class="btn btn-danger">Add Combo</button> </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Combo List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All Released Combos</h3>
            </div>
            <div class="box-body">
                <?php
                $sw = mysqli_query($con, "SELECT * from tbl_combos WHERE start_date<= CURDATE() && end_date>= CURDATE()");
                if (mysqli_num_rows($sw)) { ?>
                    <table class="table">
                        <th class="col-md-1">
                            Sl.no
                        </th>
                        <th class="col-md-3">
                            Description
                        </th>
                        <th class="col-md-2">
                            End date
                        </th>
                        <th class="col-md-2">
                            Week Date
                        </th>
                        <th class="col-md-2">
                            Amount
                        </th>
                        <th></th>
                        <?php
                        $sl = 1;
                        while ($shows = mysqli_fetch_array($sw)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $sl;
                                    $sl++; ?>
                                </td>
                                <td>
                                    <?php echo $shows['desc']; ?>
                                </td>
                                <td>
                                    <?php
                                    echo $shows['end_date'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $shows['week_date']; ?>
                                </td>
                                <td>
                                    <?php echo $shows['amount'] . ' 000đ'; ?>
                                </td>
                                <td>
                                    <div class="tools">
                                        <button class="fa fa-trash-o" onclick="del(<?php echo $shows['combo_id']; ?>)"></button>
                                        <button class="fa fa-edit" onclick="update(<?php echo $shows['combo_id']; ?>)"></button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                } else {
                ?>
                    <h3>No Shows Added</h3>
                <?php
                }
                ?>
            </div>
            <!-- /.box-footer-->
        </div>
        <br>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All Invalid Combos</h3>
            </div>
            <div class="box-body">
                <?php
                $sw = mysqli_query($con, "SELECT * FROM tbl_movie  WHERE end_date < CURDATE()");
                if (mysqli_num_rows($sw)) { ?>
                    <table class="table">
                        <th class="col-md-1">
                            Sl.no
                        </th>
                        <th class="col-md-4">
                            Combo
                        </th>
                        <th></th>
                        <?php
                        $sl = 1;
                        while ($shows = mysqli_fetch_array($sw)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $sl;
                                    $sl++; ?>
                                </td>
                                <td>
                                    <?php echo $shows['desc']; ?>
                                </td>
                                <td>
                                    <div class="tools">
                                        <button class="fa fa-trash-o" onclick="del(<?php echo $shows['movie_id']; ?>)"></button>
                                        <button class="fa fa-edit" onclick="update(<?php echo $shows['movie_id']; ?>)"></button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                } else {
                ?>
                    <h3>No Combo Added</h3>
                <?php
                }
                ?>
            </div>
            <!-- /.box-footer-->
        </div>
    </section>
    <!-- /.content -->
</div>
<?php
session_start();
if (isset($_SESSION['success'])) {
?>
    <script>
        alert("<?php echo $_SESSION['success']; ?>");
    </script>
<?php
    unset($_SESSION['success']);
}
?>
<?php
include('footer.php');
?>
<script>
    function del(m) {
        if (confirm("Are you want to delete this movie") == true) {
            window.location = "process_delete_movie.php?mid=" + m;
        }
    }
</script>
<script>
    function update(m) {
        window.location = "update_combo.php?mid=" + m;
    }
</script>