<?php
    $id = $_GET['id'];
    //database connection
    $conn = mysqli_connect('localhost', 'root', 'frontend', 'moayed');
    $query = "SELECT * FROM contacts WHERE id = '$id';";
    $result = mysqli_query($conn , $query);
    $detailes = mysqli_fetch_assoc($result);
    //checking for a change 
    if (isset($_POST['save'])) {
        //getting the cahnged data 
        $name = $_POST['name'];
        $number = $_POST['number'];
        //making a query to change the value 
        $updateQuery = "UPDATE contacts SET name = '$name' , number = '$number' WHERE id='$id';";
        mysqli_query($conn , $updateQuery);
        header('Location: index.php');
    }
    if (isset($_POST['delete'])) {
        $deleteQuery = "DELETE FROM contacts WHERE id ='$id';";
        mysqli_query($conn , $deleteQuery);
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="style.css">
    <title>Contacts</title>
</head>
<body>
    <a href="index.php" class="btn btn-success my-3">Home</a>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="text-center mb-3">
        <input type="text" class="form-control mb-3" name="name" value="<?php echo $detailes['name'];?>">
        <input type="text" class="form-control mb-3" name="number" value="<?php echo $detailes['number'];?>">
        <div>
        <input type="submit" value="Save Changes" name="save" class="btn btn-primary">
        <input type="submit" value="Delete" name="delete" class="btn btn-danger">
        </div>
    </form>
    <!--Bootstrap CDN-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!--Bootstrap compiled javascript-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>