<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
<style>

.row {
  display: flex;
}

.column {
  flex: 50%;
  padding: 10px;
  height: 600px;
}

.top {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: black;
}

.input-field3
{
  font-size: 20px;
}
.input-field4 {
  width:75%;
  padding: 10px;
  background:#EEEAE9;
  outline: none;
  border: 1px transparent;  
}
.input-field5 {
  width:67%;
  padding: 10px;
  background:#EEEAE9;
  outline: none;
  border: 1px transparent;  
}

.tmp{
  background-color: lightgrey;
}
.tmp2{
  
  margin-left: 500px;
  margin-right: 500px;
  margin-top: -160px;
  text-align: left;
}
.tmp3{
  margin-left: 10px;
  margin-right: 1000px;
  text-align: left;
}
.tmp4{
  
  margin-left: 1000px;
  margin-top: -160px;
  text-align: left;
}

.tmp5{
  background-color: lightblue;
  margin-bottom: 10px;
}

.tmp6{
  
  text-align: center;
}
  
</style>


</head>
<body>

<ul class="top">
  <li><a class="active" href="home.html" onclick="openCity(event,'London')">Home</a></li>
  <li><a href="bus reservationn.php" onclick="openCity(event,'London')">Bus Reservation</a></li>
  <li><a href="make payment.php">Verify Payment Method</a></li>
  <li><a href="cancel ticket.php">Cancel Ticket</a></li>
  <li><a href="bus schedule.php">Bus Schedule</a></li>
  <li><a href="make complain.php">Make Complain</a></li>
  <li style="float:right"><a href="contact.php">Contact us</a></li>
  <li style="float:right"><a href="about.php">About</a></li>
</ul><br><br>


<div class="row">
  <div class="column" style="background-color:#aaa;">
    <img src="bus.jpg.png" alt="LOGO" width="1000" height="600">
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Search your bus here</h2><br>
    <form action="search_bus.php" text-align="center" method="post">
  <label for="from" class="input-field3">From:</label><br>
            <select class="input-field4" type="text"  name="from" id="from">
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Khulna">Khulna</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Barishal">Barishal</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Mymensingh">Mymensingh</option>
            <option value="Sylhet">Sylhet</option>
            <option value="Jessor">Jessor</option>
            <option value="Chuadanga">Chuadanga</option>
            <option value="Kustia">Kustia</option>
            <option value="Rangamati">Rangamati</option>
            <option value="Cox's Bazar">Cox's Bazar</option>
            </select><br><br>
  <label for="to" class="input-field3">To:</label><br>
            <select class="input-field4" type="text"  name="to" id="to">
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Khulna">Khulna</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Barishal">Barishal</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Mymensingh">Mymensingh</option>
            <option value="Sylhet">Sylhet</option>
            <option value="Jessor">Jessor</option>
            <option value="Chuadanga">Chuadanga</option>
            <option value="Kustia">Kustia</option>
            <option value="Rangamati">Rangamati</option>
            <option value="Cox's Bazar">Cox's Bazar</option>
            </select><br><br>
  <label for="Date of Journey" class="input-field3">Date of Journey:</label><br>
  <input type="date" class="input-field5" id="Date of Journey" name="date" required><br><br>

<label for="busTp" class="input-field3">Choose Bus Type:</label><br>
  <select id="busType" name="type" class="input-field4">
    <option value="AC">AC</option>
    <option value="NON_AC">NON_AC</option>
  </select>
  <br><br><br><br>
  <input type="Submit" value="Submit to Search Buses" class="input-field4">
</form><br><br><br>
  </div>
</div>

<br><hr>

<div class="tmp">
<a style="text-align: center;">
<br><h2>Availabe Bus Routes</h2>

<div class="tmp3">
  Dhaka To Chittagong<br>
  Dhaka To Rajshahi<br>
  Dhaka To Khulna<br>
  Dhaka To Barishal<br>
  Dhaka To Mymensingh<br>
  Dhaka To Rangpur<br>
  Dhaka To Chuadanga<br>
  Dhaka To Kushtia<br>
  Dhaka To Comilla<br> 
</div>

<div class="tmp2">
  Chittagong To Dhaka<br>
  Rajshahi To Dhaka<br>
  Khulna To Dhaka<br>
  Barishal To Dhaka<br>
  Mymensingh To Dhaka<br>
  Rangpur To Dhaka<br>
  Chuadanga To Dhaka<br>
  Kushtia To Dhaka<br>
  Comilla To Dhaka<br> 
</div>

<div class="tmp4">
  Rajshahi To Chittagong<br>
  Barishal To Rajshahi<br>
  Comilla To Khulna<br>
  Kushtia To Barishal<br>
  Chuadanga To Mymensingh<br>
  Rajshahi To Rangpur<br>
  Chittagong To Chuadanga<br>
  Bhola To Kushtia<br>
  Sylhet To Comilla<br> 
</div>


</a>
<br><br>
</div>

<br>
<hr>

<div class="tmp5">
  <br>

  <div class="tmp6" id="footer">
    Developed and Maintained by <br><br>
    Saifuzzaman Saif <br>
    Md Shariful Islam<br><br>
  </div>

</div>
<hr>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>
</body>
</html>
