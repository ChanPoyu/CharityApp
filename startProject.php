
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Project Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div class="projectForm">
      <form class="" action="projectForm.php" method="post">
        <p>Project Name:&nbsp;&nbsp;&nbsp;<input type="text" name="projectName" value="" id="name"></p>
        <p>Target Amount:&nbsp;<input type="number" name="targetAmount" value="" id="amount"></p>
        <p>Expire:&nbsp;<input type="date" name="expire" value="" id="expire"></p>
        <p>Purpose: </p><textarea name="purpose" rows="8" cols="80"></textarea>
        <p>Address <input type="text" name="address" value="" id="address"><button type="button" name="button" onclick="buildContract()">generate</button></p>
        <input type="submit" name="submit" value="submit" id="submitProject" style="display:none; border: 1px #000 solid">
      </form>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>

    <script type="text/javascript">
    if(web3){
      var web3 = new Web3();
      web3.setProvider(new Web3.providers.HttpProvider('http://localhost:8545'));

    }
    // console.log(web3.eth.coinbase);


    function buildContract(){

      var _name = $("#name").val();
      var _value = $("#amount").val();
      var _duration = new Date($("#expire").val()).getTime();
      _duration = (_duration - Date.now()) / 1000;
      var charityContract = web3.eth.contract([{"constant":true,"inputs":[],"name":"getContractAddress","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"recievedAmount","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"getProjectName","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"checkShare","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"inputs":[{"name":"_name","type":"string"},{"name":"_value","type":"uint256"},{"name":"_duration","type":"uint256"}],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"payable":true,"stateMutability":"payable","type":"fallback"},{"anonymous":false,"inputs":[{"indexed":false,"name":"_from","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"donationDeposite","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"name":"_name","type":"string"},{"indexed":false,"name":"_value","type":"uint256"}],"name":"projectLaunch","type":"event"}]);
      console.log(charityContract);

      var charity = charityContract.new(
         _name,
         _value,
         _duration,
         {
           from: web3.eth.accounts[0],
           data: '0x6080604052601260045534801561001557600080fd5b506040516105bd3803806105bd833981018060405281019080805182019291906020018051906020019092919080519060200190929190505050826000908051906020019061006592919061016a565b50600454600a0a820260018190555033600560006101000a81548173ffffffffffffffffffffffffffffffffffffffff021916908373ffffffffffffffffffffffffffffffffffffffff1602179055508042016003819055507fd544f32fe29a448270ad40ee1915e7d03f3c7c71dcf057c5ce0d451f20a99cc783836040518080602001838152602001828103825284818151815260200191508051906020019080838360005b8381101561012757808201518184015260208101905061010c565b50505050905090810190601f1680156101545780820380516001836020036101000a031916815260200191505b50935050505060405180910390a150505061020f565b828054600181600116156101000203166002900490600052602060002090601f016020900481019282601f106101ab57805160ff19168380011785556101d9565b828001600101855582156101d9579182015b828111156101d85782518255916020019190600101906101bd565b5b5090506101e691906101ea565b5090565b61020c91905b808211156102085760008160009055506001016101f0565b5090565b90565b61039f8061021e6000396000f30060806040526004361061006d576000357c0100000000000000000000000000000000000000000000000000000000900463ffffffff16806332a2c5d0146100995780634d012f58146100f0578063722713f71461011b5780639faf621514610146578063f559b920146101d6575b3460026000828254019250508190555061009733600454600a0a3481151561009157fe5b04610201565b005b3480156100a557600080fd5b506100ae610249565b604051808273ffffffffffffffffffffffffffffffffffffffff1673ffffffffffffffffffffffffffffffffffffffff16815260200191505060405180910390f35b3480156100fc57600080fd5b50610105610251565b6040518082815260200191505060405180910390f35b34801561012757600080fd5b5061013061026b565b6040518082815260200191505060405180910390f35b34801561015257600080fd5b5061015b61028a565b6040518080602001828103825283818151815260200191508051906020019080838360005b8381101561019b578082015181840152602081019050610180565b50505050905090810190601f1680156101c85780820380516001836020036101000a031916815260200191505b509250505060405180910390f35b3480156101e257600080fd5b506101eb61032c565b6040518082815260200191505060405180910390f35b80600660008473ffffffffffffffffffffffffffffffffffffffff1673ffffffffffffffffffffffffffffffffffffffff168152602001908152602001600020819055505050565b600030905090565b6000600454600a0a60025481151561026557fe5b04905090565b60003073ffffffffffffffffffffffffffffffffffffffff1631905090565b606060008054600181600116156101000203166002900480601f0160208091040260200160405190810160405280929190818152602001828054600181600116156101000203166002900480156103225780601f106102f757610100808354040283529160200191610322565b820191906000526020600020905b81548152906001019060200180831161030557829003601f168201915b5050505050905090565b6000600660003373ffffffffffffffffffffffffffffffffffffffff1673ffffffffffffffffffffffffffffffffffffffff168152602001908152602001600020549050905600a165627a7a7230582083544957f44c444490d84d474b6f97b4cae24e9955efc54bd959fee39f1855480029',
           gas: '4700000'
         }, function (e, contract){
          console.log(e, contract);
          if (typeof contract.address !== 'undefined') {
               console.log('Contract mined! address: ' + contract.address + ' transactionHash: ' + contract.transactionHash);
               $("#address").val(contract.address);
               $("#submitProject").css("display", "block");
          }
       })
    }



    </script>

  </body>
</html>
