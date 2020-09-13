<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Simple File Upload!</title>
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Simple File Upload</h1>
            <p class="lead">This is a simple helper to assist you handle file uploads.
                Since we are not going into depths, we will just upload the file without
                much processing such as checking file type, but will provide branches(when I get time)
                that will handle several types as you shall need.</p>
            <hr class="my-4">
            <p>We use Bootstrap to design our simple upload form. All uploads will be on the folder
                <strong>uploads</strong>
            </p>
        </div>

        <?php

if(isset($_POST['submit'])){
    # file type 
    $type = $_FILES['file']['type'];

    # file name
    $file_name = $_FILES['file']['name'];

    # file size in KB
    $file_size = $_FILES['file']['size'];

    # temp file to upload
    $tmp_file = $_FILES['file']['tmp_name'];

    # file exists
    if(file_exists('uploads/'. $file_name)){
        echo "file exists";
    }

    if(!session_id()){
        session_start();
        $unq = session_id();
    }

    # rename file uploaded and replace special characters with underscores
    $file_name = $unq . '_' . time() . '_' . str_replace(array('!', "@", '#', '$', '%', '^', '&', ' ', '*', '(', ')', ':', ';', ',', '?', '/'. '\\', '~', '`', '-'), '_', strtolower($file_name));

    if(move_uploaded_file($tmp_file, 'uploads/'. $file_name)){
        echo "<p class='alert alert-success'>File uploaded successfully</p>";
    } else {
        echo "<p class='alert alert-danger'>File failed to upload.</p>";
    }
}

?>
        <!-- Upload form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="filechoose">Choose File</label>
              <input type="file" name="file" class="form-control-file" id="filechoose">
              <button class="btn btn-success mt-3" type="submit" name="submit">Upload</button>
            </div>
          </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>