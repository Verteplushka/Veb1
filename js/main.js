$("#clearM").on("click", clearM);
$("#submit").on("click", checkAllFields);

document.getElementById("x").addEventListener("input", function () {
  localStorage.setItem("x", this.value);
});
document.getElementById("y").addEventListener("input", function () {
  localStorage.setItem("y", this.value);
});

document.getElementById("1").addEventListener("input", function () {
  localStorage.setItem("r", this.value);
});
document.getElementById("2").addEventListener("input", function () {
  localStorage.setItem("r", this.value);
});
document.getElementById("3").addEventListener("input", function () {
  localStorage.setItem("r", this.value);
});
document.getElementById("4").addEventListener("input", function () {
  localStorage.setItem("r", this.value);
});
document.getElementById("5").addEventListener("input", function () {
  localStorage.setItem("r", this.value);
});

window.addEventListener("load", function () {
  var savedInputValue = localStorage.getItem("x");
  if (savedInputValue !== null) {
    this.document.getElementById("x").value = savedInputValue;
  }
});
window.addEventListener("load", function () {
  var savedInputValue = localStorage.getItem("y");
  if (savedInputValue !== null) {
    this.document.getElementById("y").value = savedInputValue;
  }
});
window.addEventListener("load", function () {
  var savedInputValue = localStorage.getItem("r");
  if (savedInputValue !== null) {
    this.document.getElementById(savedInputValue).checked = true;
  }
});

function clearM() {
  document.getElementById("tbody").innerHTML = "";
  localStorage.setItem("tbody", "");
}

document.getElementById("tbody").innerHTML = localStorage.getItem("tbody");

function checkAllFields() {
  var x = $("#x").val();
  var y = $("#y").val();
  var r = $("input[name='r']:checked").val();
  var response = "";
  localStorage.setItem("tbody", document.getElementById("tbody").innerHTML);

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
}
