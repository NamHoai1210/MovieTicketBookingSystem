<?php include('header.php'); ?>
<div class="content">
    <div class="wrap">
        <div class="content-top">
            <h2 style="color:#555;text-align:center">(COMING SOON)</h2>
            <a href="movies_events.php" style="text-decoration:none;">
                <h5 style="color:#757575; text-align:center">&lt; NOW SHOWING</h5>
            </a>
        </div>
        <?php
        $today = date("Y-m-d");
        $qry2 = mysqli_query($con, "select * from  tbl_movie where release_date > CURDATE() ORDER BY release_date");

        while ($m = mysqli_fetch_array($qry2)) {
        ?>
            <div class="col_1_of_4 span_1_of_4">
                <div class="imageRow">
                    <div class="single">
                        <a href="about.php?id=<?php echo $m['movie_id']; ?>"><img src="<?php echo $m['image']; ?>" alt="" style="width: 259px; height: 383px; object-fit: fill;" /></a>
                    </div>
                    <div class="movie-text">
                        <h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id']; ?>" style="text-decoration:none;"><?php echo $m['movie_name']; ?></a></h4>
                        Release date: <Span class="color2" style="text-decoration:none;"><?php echo $m['release_date']; ?></span><br>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
    <div class="clear"></div>
</div>
<?php include('footer.php'); ?>