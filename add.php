<!DOCTYPE html>
<html lang="en">
<head>
    <title>simple silder</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"  href="files/favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container mt-3">

    <form method="post" action="insert.php" enctype="multipart/form-data" id="slide-form">
        <p>Add New Slide:</p>

        <div class="form-group ">
            <label for="alt">Slide Alt:</label>
            <input type="text" class="form-control" name="img_alt" id="alt" value="" required>
        </div>

        <div class="custom-file mb-3">

            <input type="file" class="custom-file-input" id="customFile" name="img_file" accept="image/*" required>
            <label class="custom-file-label" for="customFile">Slide Image</label>

        </div>
        <div class="form-group">
            <img id="img_preview" src="#" alt="your image" />
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger pull-right" onclick="location.href='panel.php';">Cancel</button>
        </div>
    </form>
</div>

<script>
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
