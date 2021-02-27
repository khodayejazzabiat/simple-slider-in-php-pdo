<?php

include 'include/selectAllSlides.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple Slider</title>
    <link rel="shortcut icon" href="files/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Slider Management Panel</h2>
    


<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No.</th>
            <th>Alt</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i=1;
        while ($row=$stmt->fetch()):
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"
                ><?php echo $row['alt']; ?></td>
                <td><img src=<?php echo $row['address']; ?> style="width:100%"></td>
                <td>
                    <form method="post" action="edit.php">
                        <input type="hidden" name="id" id="image_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="alt" id="image_alt" value="<?php echo $row['alt']; ?>">
                        <input type="hidden" name="address" id="image_address" value="<?php echo $row['address']; ?>">
                        <input type="submit" value="edit" class="btn btn-info">
                    </form>
                </td>
                <td>
                    <form  method="post" action="delete.php">
                        <input type="hidden" name="id" id="image_address" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="address" id="image_address" value="<?php echo $row['address']; ?>">
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            <?php
            $i++;
        endwhile;
        ?>
        <tr>
             <td colspan="4">
              <!--  <a href="add.php" class="btn btn-success" role="button">Add</a> -->
                <button type="button" class="btn btn-success" onclick="location.href='add.php';">Add</button>   
            </td>  
            <td >
              <!--  <a href="index.php" class="btn btn-danger"  role="button">Slider</a> -->
                <button type="button" class="btn btn-danger" onclick="location.href='index.php';">Slider</button>
            </td>      
        </tr>

        </tbody>
    </table>
</div>

</div>

</body>
</html>

