<?php
//database connection
$conn = mysqli_connect('localhost', 'root', 'frontend', 'moayed');
//checking for submit
if (isset($_POST['search'])) {
    $searchKey = $_POST['searchKey'];
    //making the search query 
    $query = "SELECT * FROM contacts  WHERE name LIKE '%$searchKey%' OR number LIKE '%$searchKey%';";
    $result = mysqli_query($conn, $query);
    $contact = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
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
        <input type="text" class="form-control mb-3" placeholder="Name or Phone number" name="searchKey">
        <input type="submit" value="Search" name="search" class="btn btn-danger">
    </form>
    <?php
        if (isset($contact)) {
            foreach($contact as $person) {
                echo "<span>" .$person['name']. "<a href = edit.php?id=" . $person['id'] .">Edit</a>"."</span>";
                echo "<span class = "."mb-3".">" .$person['number']."</span>";
            }
        }
    ?>
    <!--Bootstrap CDN-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!--Bootstrap compiled javascript-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
