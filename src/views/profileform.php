<?php
if(isset($_POST["id"]))
{
    echo $_POST["id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $jsondata = file_get_contents("../file1.json");
    $phpdata = json_decode($jsondata,true);
    // print_r($phpdata);

    ?>
 
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form method="post" action="../controllers/registercontroller.php">
                    <label for="profile">Profile Name</label>
                    <br>
                    <input type="text" name="profile" placeholder="enter profile name" class="form-control">
                    <br>
                    <label for="profile">Category</label>
                    <select name="category" id="category" class="form-control">
                        <?php foreach ($phpdata as $k => $v) {
                            foreach ($v as $k1 => $v1) {
                                foreach ($v1 as $k2 => $v2) {
                                    echo "<option value=" . $v2 . ">" . $v2 . "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                    <select name="subcategory" class="form-control mt-5" id="subcategory">

                    </select>
                    <br>

                    <button type="submit" name="submit" class="btn btn-primary">submit</button>

                </form>
            </div>
        </div>
    </div>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
       $("#category").change(function(){
    
        var categoryid = $(this).val();
       
          $.ajax({
           
            type:'POST',
            url:"../controllers/registercontroller.php",
            data:"id=" +categoryid,
            success:function(data)
           {
            console.log(data);
              $("#subcategory").append(data);
           }
          
         });
       });
    </script>


    

</body>


</html>