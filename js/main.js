$("#clearM").on("click", clearM);
$("#submit").on("click", checkAllFields);

function clearM() {
  document.getElementById("tbody").innerHTML = "";
}

function checkAllFields() {
  var x = $("#x").val();
  var y = $("#y").val();
  var r = $("input[name='r']:checked").val();
  var response = "";
  localStorage.setItem("tbody", document.document.getElementById("tbody").innerHTML);

  if (isNaN(x)) {
    response = "X must be a number";
  } else if (!(x <= 3 && x >= -3)) {
    response = "X must be in [-3; 3]";
  } else if (x == "") {
    response = "X must be chosen";
  } else if (y == "") {
    response = "Y must be chosen";
  } else if (r == undefined) {
    response = "R must be chosen";
  }

  if (response != "") {
    document.getElementById("error").innerHTML = response;
    event.preventDefault();
    return;
  }
  document.getElementById("error").innerHTML = "";
  $.ajax({
    url: "php/main.php",
    type: "POST",
    cache: false,
    data: { x: x, y: y, r: r },
    dataType: "html",
    beforeSend: function () {
      $("#submit").prop("disabled", true);
    },
    success: function (data) {
      $("#tbody").append(data);
      $("#submit").prop("disabled", false);
    },
  });

  function showTable(){
    document.getElementById("tbody").innerHTML = localStorage.getItem("tbody");
  }

}
