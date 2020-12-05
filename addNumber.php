<?php
    //database connection
    $conn = mysqli_connect('localhost' , 'root' , 'frontend' , 'moayed');

    //checking for a submit
    if (isset($_POST['submit'])) {
        //getting the submitted data from the form
       $name = $_POST['name'];
       $number = $_POST['number'];

       //making a query to add to the data base
       $query = "INSERT INTO contacts (name , number) VALUES ('$name' , '$number');";
       //calling the query 
       mysqli_query($conn , $query);
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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="text-center">
        <div class="form-group">
            <input type="text" name="name" placeholder="Name" class="form-control my-3">
            <input type="text" name="number" placeholder="number" class="form-control my-3">
            <input type="submit" class="btn btn-danger" name="submit" value="Add Number">
        </div>
    </form>
     <!--Bootstrap CDN-->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!--Bootstrap compiled javascript-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>