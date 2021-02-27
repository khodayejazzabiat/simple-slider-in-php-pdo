<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    //if(isset...).... 
   $iId= $_POST['id'];
   $iAlt=$_POST['alt'];
   $iAddress=$_POST['address'];

}else
{
    die('<meta http-equiv="refresh" content="0; URL=panel.php">');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple Slider</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="files/favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-3">

    <form method="post" action="update.php" enctype="multipart/form-data" id="slide-form">
        <p>Add New Slide:</p>

        <input type="hidden" name="id" value="<?php echo $iId;?>" class="hide" >
        <input type="hidden" name="preAlt" value="<?php echo $iAlt;?>" class="hide" >
        <div class="form-group ">
            <label for="alt">Slide Alt:</label>
            <input type="text" class="form-control" name="img_alt" id="alt" value="<?php echo $iAlt; ?>" required>
        </div>

        <div class="custom-file mb-3">

            <input type="file" class="custom-file-input" id="customFile" name="img_file" accept="image/*" >
            <label class="custom-file-label" for="customFile">Slide Image</label>

        </div>
        <div class="form-group">
            <img id="img_preview" src="<?php echo $iAddress;?>" alt="your image" />
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger pull-right" onclick="location.href='panel.php';">Cancel</button>
        </div>
    </form>
</div>

<script>
    // Add the following code if you want the name of the file appear on select
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#customFile").change(function() {
        readURL(this);
    });
</script>

</body>
</html>
