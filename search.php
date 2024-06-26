<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #maincontainer{
            min-height: 100vh;
        }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    

    <!-- Search Results -->
  <div class="container my-3" id="maincontainer">
        <h1 class="py-3">Search results for <em>"<?php echo $_GET['search']?>"</em></h1>

        <?php
        $search = $_GET['search'];
        $sql = "SELECT * FROM `threads` WHERE `thread_title` LIKE '%$search%'";
        // $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result = mysqli_query($conn, $sql); 
        // var_dump($result);die;
        while($row = mysqli_fetch_assoc($result)){
            // print_r($row);die;
          echo '<div class="media my-3">
          <img src="img/userdefault.png" width="54px" class="mr-3" alt="...">
          <div class="media-body">'.
           '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $row['thread_id']. '">'. $row['thread_title'] . ' </a></h5>
              '. $row['thread_desc'] . ' </div>'.'<div class="font-weight-bold my-0"> Asked by: NA at '. $row['timestamp']. '</div>'.
      '</div>'; 
        }
        
        ?>
    
            <!-- <div class="result">
                        <h3><a href="'. $url. '" class="text-dark">'. $title. '</a> </h3>
                        <p>'. $desc .'</p>
                  </div> -->  
  </div>

    <?php include 'partials/_footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>