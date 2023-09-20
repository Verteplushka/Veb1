// document.getElementById("x").addEventListener("input", validateX);

// // document.getElementById('x').style.color = "red";

// function validateX() {
//   var x = document.getElementById("x").value;
//   console.log("validateX");
//   if (!isNaN(x) && x <= 3 && x >= -3) {
//     document.getElementById("x").style.color = "black";
//   }
//   document.getElementById("x").style.color = "red";
// }

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
