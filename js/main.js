$("#clearM").on("click", clearM);


function clearM(){
  $.ajax({
    url: 'php/clearM.php',
    type: 'GET',
    cache: false,
    data: {},
    dataType: 'html',
    beforeSend: function(){
      $("#clearM").prop("disabled", true);
    },
    success: function(data){
        alert(data);
        $("#clearM").prop("disabled", false);
    }
  })
} 

function checkAllFields(element) {
  var x = element.x.value;
  var y = element.y.value;
  var r = element.r.value;
  var response = "";
  if (isNaN(x)) {
    response = "X must be a number";
  } else if (!(x <= 3 && x >= -3)) {
    response = "X must be in [-3; 3]";
  } else if (y == "") {
    response = "Y must be chosen";
  } else if (r == "") {
    response = "R must be chosen";
  }

  if (response != "") {
    document.getElementById("error").innerHTML = response;
    return false;
  }
  return true;
}
