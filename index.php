<?php

include 'include/selectAllSlides.php';

    //if the table is empty redirect to sliderManagementPage 'add.php'
    if($rowCount<=0) 
    {
        die('<meta http-equiv="refresh" content="0; URL=add.php">');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple Slider</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="files/favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="text-center" style="margin: .5% 0%">
        <a class="btn btn-primary " href="panel.php" role="button"><h4>Slider Management Panel</h4></a>
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <?php
            for ($i=1;$i<$rowCount;$i++)
            {
                echo "<li data-target='#myCarousel' data-slide-to='.$i.' ></li>";
            }
            ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="max-height: 500px; width: 100% ">
            <?php
            $row=$stmt->fetch()
            ?>
            <div class="item active">

                <img src=
                        "<?php echo $row['address']?>"
                     alt=
                        "<?php echo $row['alt']?>"
                     style="width:100%;">

            </div>

            <?php while ($row=$stmt->fetch()):?>

            <div class="item">
                <img src=
                     "<?php echo $row['address']?>"
                     alt=
                     "<?php echo $row['alt']?>"
                     style=" width:100%;">
            </div>

            <?php endwhile; ?>


        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


</div>

</body>
</html>
