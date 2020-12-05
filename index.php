<?php
    //database connection
    $conn = mysqli_connect('localhost' , 'root' , 'frontend' , 'moayed');
    $query = "SELECT * FROM contacts ORDER BY name";
    $result = mysqli_query($conn , $query);
    $contacts = mysqli_fetch_all($result , MYSQLI_ASSOC);
    mysqli_free_result($result);
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
    <div class="links mb-5">
        <a href="addNumber.php" class="btn btn-warning">Add Number</a>
        <a href="searchNumber.php" class="btn btn-warning">Search Number</a>
    </div>
    <div class="contacts">
        <div class="names">
            <h1>Names</h1>
             <?php foreach($contacts as $contact) : ?>
                       <p> <?php echo $contact['name']; ?> <a href="edit.php?id= <?php echo $contact['id'];?>">Edit</a></p>
                 <?php endforeach; ?>
        </div>
        <div class="numbers">
            <h1>Phones</h1>
            <?php foreach($contacts as $contact) : ?>
                    <p><?php echo $contact['number']; ?> </p>
                 <?php endforeach; ?>
        </div>
    </div>
    <!--Bootstrap CDN-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!--Bootstrap compiled javascript-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>