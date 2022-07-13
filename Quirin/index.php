<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <?php include_once('bootstrap.php'); ?>
       <?php    
            require_once("db_connect.php");
       ?>
       <title></title>
       <style>
            a{
                text-decoration: none;
                color:black;
                border-bottom:2px solid black;

            }a:hover{
                color:black;
            }

            .imgContainer{
                height:200px;
                background-repeat: no-repeat;
                background-position: center;
                background-color:antiquewhite;
            }
        </style>
   </head>
   <body>
    
        <div class="container">
        <h1> <a href="index.php">Restaurant</a> </h1>
        
            <?php
                if(isset($_GET['id'])){
                    $sql = "SELECT name, image, description, price FROM dishes WHERE id=".$_GET['id'];  
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        echo 
                            "<h3>".$row['name']."</h3>".
                            "<div class='imgContainer' style=".'background-image:url('.$row["image"].')> </div>'.
                            "<p>".$row['description']."</p>".
                            "<p class='text-muted'>".$row['price']."€ </p>".
                            "</div> </div>";   
                    }
                }
                else{
                    echo "<h3> Meals </h3>";
                    echo "<div class='row row-cols-3 g-5'>";
                    $sql = "SELECT id, image, name FROM dishes";  
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        echo 
                            "<div class='col'> <div class='card'>" .
                            "<div class='imgContainer' style=".'background-image:url('.$row["image"].')> </div>'.
                            "<h3>".$row['name']."</h3>".
                            "<a href=index.php?id=".$row['id'].">Show more</a>".
                            "</div> </div>";
                        
                    }
                }
            ?>
        </div>
            </div>

</body>
</html>