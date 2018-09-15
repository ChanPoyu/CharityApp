pragma solidity ^0.4.24;

contract Charity{
  string projectName;
  uint targetAmount;
  uint recieved;
  uint expire;
  uint decimals = 18;
  address contractOwner;

  mapping (address => uint) donarToShare;

  event donationDeposite(address _from, uint value);
  event projectLaunch(string _name, uint _value);

  modifier onlyOwner (){
    require(msg.sender == contractOwner);
    _;
  }

  modifier achieveAmount () {
    require(recieved <= targetAmount);
    _;
  }

  modifier timeLimit () {
    require(now <= expire);
    _;
  }

  function () payable {
    recieved += msg.value;
    addShare(msg.sender, msg.value/(10 ** decimals));
  }

  function Charity(string _name, uint _value,uint _duration) {
    projectName = _name;
    targetAmount = _value * 10 ** decimals;
    contractOwner = msg.sender;
    expire = now + _duration;
    projectLaunch(_name, _value);
  }

  function recievedAmount () external view returns(uint) {
    return recieved / (10 ** decimals);
  }

  function addShare(address _donar, uint _value) internal {
    donarToShare[_donar] = _value;
  }

  function balanceOf() view external returns(uint){
      return this.balance;
  }

  function getProjectName() view external returns(string){
    return projectName;
  }

  function getContractAddress() view external returns(address){
    return address(this);
  }

  function checkShare () view external returns(uint){
    return donarToShare[msg.sender];
  }

}
