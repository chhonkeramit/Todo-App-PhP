<?php

include 'dbconnect.php';


if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    // $password = $_POST['password'];

    $query = "update lists set title='$title' WHERE id= '$id'";
    mysqli_query($conn, $query);

    header('location:index.php');
    // 2nd way of doing it by javascript
    // echo '<script type="text/javascript">
    //        window.location = "https://system.amitsinghchhonker.com/display.php"
    //   </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container col-lg-6 m-auto p-4">

        <h2 class="INSERT text-center bg-dark text-white p-3 ">UPDATE YOUR DATA</h2>
        <form method="post">
            <div class="form-group">

                <input type="text" class="form-control mt-5 p-3" placeholder="Enter Username" name="title">
            </div>


            <button type="submit" class="btn btn-danger" name="update">Edit</button>
        </form>
    </div>


</body>

</html>