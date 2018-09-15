<?php
  $projectName = $_POST["projectName"];
  $targetAmount = $_POST["targetAmount"];
  $projectPurpose = $_POST["purpose"];
  $address = $_POST["address"];
  $launchDate = date("Y-m-d");
  $expireDate = $_POST["expire"];

  session_start();
  $_SESSION['projectName'] = $projectName;
  $_SESSION['targetAmount'] = $targetAmount;
  $_SESSION['projectPurpose'] = $projectPurpose;
  $_SESSION['address'] = $address;
  $_SESSION['launchDate'] = $launchDate;
  $_SESSION['expireDate'] = $expireDate;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1><?=$projectName?></h1>
    <h3>Target Amount : <?=$targetAmount?></h3>
    <h3>The purpose of this project<br> <?=$projectPurpose?></h3>
    <h3>send ETH to <?=$address?></h3>
    <h3>start from <?=$launchDate?> </h6>
    <h3>project active until <?=$expireDate?></h3>

    <button type="button" name="button" onclick="sendProject()">confirm</button>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>
    <script type="text/javascript">

    var sendProject = function(){
      $.ajax({url:"writeData.php", success:function(result){
        console.log(result);
      }
    });
    location.href = "index.php";
  }

    </script>

  </body>
</html>
