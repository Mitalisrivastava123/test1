<?php
include "../config/config.php";


$jsondata = file_get_contents("../file1.json");
$phpdata = json_decode($jsondata,true);



 $profile = $_POST["profile"];
$category = $_POST["category"];

if(isset($_REQUEST["id"]))
{
//   echo $_REQUEST["id"];
  foreach($phpdata as $k => $v)
  {
    // echo $v;
    foreach($v as $k1 => $v1)
    {
        // echo $v1;
       foreach($v1 as $k2 =>$v2)
       {
        // echo $v2;
        foreach($v2 as $k3 => $v3)
        {
            // echo $v3;
            foreach($v3 as $k4 => $v4)
            {
                echo "<option value=" . $k4 . ">" . $k4 . "</option>";
            }
        }
       }
    }
  }
}

$user = User::create(array('profilename' =>  $profile, 'category' => $category , 'subcategory' =>$k4));





?>