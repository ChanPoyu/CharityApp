<?php

echo '<h1>projects</h1>';
echo '<div>';
$file = fopen('data/fundProjects.csv', 'r');

flock($file, LOCK_EX);
if($file){
  while ($line = fgets($file)) {
    $pieces = explode(",", $line);

    // echo '<a href="index.php">';
    echo '<div class="displayProjects">';
    echo '<h1>';
    echo $pieces[0];
    echo '</h1>';
    echo 'target Amount: ';
    echo $pieces[1].'ETH';
    echo '<br>';
    echo 'address: '.$pieces[3];
    echo '<button id="'.$pieces[3].'">donate</button>';
    echo '</div>';
    // echo '</a>';
  }
}
flock($file, LOCK_UN);
fclose($file);
echo '</div>';




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Support Projects</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


    <a href="index.php">back to home</a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>
    <script type="text/javascript">
      if(web3){
        var web3 = new Web3();
        web3.setProvider(new Web3.providers.HttpProvider('http://localhost:8545'));
        var coinbase = web3.eth.coinbase;
        console.log(coinbase);
      }
      $("button").click(function(){
        var contractId = this.id;
        web3.eth.sendTransaction({from: coinbase, to: contractId, value: web3.toWei(0.1, "ether")}, function(e,r){
          if(e){
            console.log(e);
          }else if(r){
            console.log(r);
          }
        });
      })
    </script>

  </body>
</html>
