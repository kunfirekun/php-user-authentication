<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    //you can use watchPosition(showPosition); in place of getcurrentposition to get movement and the decimal points are more accurate
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "https://www.google.com/maps/@" + position.coords.latitude + 
  "," + position.coords.longitude+",21z";
}
</script>

</body>
</html>
