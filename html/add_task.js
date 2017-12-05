

function addTask(){
  var choosenList= document.getElementById('myDropdown');
  var choosenListValue= choosenList.options[choosenList.selectedIndex].value;
  var oldList = document.getElementById(choosenListValue);
  var taskToAdd = document.querySelector('input[name=tasks]');
  var taskToAddValue = taskToAdd.value;
  var createdTask = document.createElement("li");

  let request = new XMLHttpRequest();
//  request.addEventListener('load', receiveComments);
  request.open('POST', 'addSingleTask.php',false);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(encodeForAjax({name: taskToAddValue, listID: choosenListValue}));

}


function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function receiveComments(data) {
//alert(this.responseText);

}