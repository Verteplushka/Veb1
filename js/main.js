$("#clearM").on("click", clearM);
$("#submit").on("click", checkAllFields);

function clearM() {
  $.ajax({
    url: "php/clearM.php",
    type: "POST",
    cache: false,
    data: {},
    dataType: "html",
    beforeSend: function () {
      $("#clearM").prop("disabled", true);
    },
    success: function (data) {
      $("#clearM").prop("disabled", false);
    },
  });
}

function checkAllFields() {
  var x = $("#x").val();
  var y = $("#y").val();
  var r = $("#r").val();
  var response = "";
  if (isNaN(x)) {
    response = "X must be a number";
  } else if (!(x <= 3 && x >= -3)) {
    response = "X must be in [-3; 3]";
  } else if (x == "") {
    response = "X must be chosen";
  } else if (y == "") {
    response = "Y must be chosen";
  } else if (r == "") {
    response = "R must be chosen";
  }

  if (response != "") {
    document.getElementById("error").innerHTML = response;
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
      $("#submit").prop("disabled", false);
    },
  });
}
