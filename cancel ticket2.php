<!DOCTYPE html>
<html>
<head>
  <title>Cancel ticket</title>
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

.input-container{
  padding-bottom: 30px;
  width: 100%;
}
.input-field {
  width:40%;
  padding: 10px;
  background: lightgrey;
  outline: none;
  border: 2px transparent;  
  margin-left: 11%;
}
         
.input-field:focus {
  border: 2px grey;
}

.input-field2
{
  margin-left: 20%;
  padding: 2%;
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

.rsb
{
  border: 2px solid;
  margin-left: 42%;
  margin-right: 48%;
  padding: 10px;
  font-size: 16px;
  background-color: lightgrey;
  
}

.btck
{
  border: 2px solid;
  margin-left: 200px;
  margin-right: 400px;
  margin top: -100px;
}

.box
{
  text-align: left;
  margin-left: 10%;
  font-size: 17px;
  margin-right: 10%;
  padding: 10px;
  border: 2px solid lightgrey;
}

.box2
{
  text-align: left;
  margin-left: 10%;
  
  margin-right: 10%;
  padding: 10px;
  border: 2px solid lightgrey;
}
table, th, td {
  border: 1px solid lightgrey;
  border-collapse: collapse;
}
td
{
  padding: 10px;
}
  
</style>


</head>
<body>

<ul class="top">
  <li><a class="active" href="home.html">Home</a></li>
  <li><a href="bus reservationn.html">Bus Reservation</a></li>
  <li><a href="make payment.html">Verify Payment Method</a></li>
  <li><a href="cancel ticket.html">Cancel Ticket</a></li>
  <li><a href="bus schedule.html">Bus Schedule</a></li>
  <li><a href="make complain.html">Make Complain</a></li>
  <li style="float:right"><a href="contact.html">Contact us</a></li>
  <li style="float:right"><a href="about.html">About</a></li>
</ul><br><br>
<div style="border: 3px solid lightgrey;">
  <div style="background-color: red; font-size: 25px; text-align: center;">
    <label style="color: white; text-align: center">Cancel Ticket</label>
  </div><br><br><br>
<?php

    $id = $_POST['booking_id'];

    $conn = mysqli_connect('localhost', 'root', '', 'web project');
    if(!$conn)
    {
      echo '<script>alert("Connection Failed. Try again please.")</script>';
      ?><meta http-equiv="refresh" content="0; URL='cancel ticket.php'"/> <?php
    }
    else
    {
     // echo "connection successfull";
      $q0 = "SELECT * FROM booking WHERE booking_id='".$id."'";
      $r0 = mysqli_query($conn, $q0);
      $n0 = mysqli_num_rows($r0);
      $sts="( ";
      if($n0==0)
      {
        echo '<script>alert("Wrong booking id.")</script>';
        ?><meta http-equiv="refresh" content="0; URL='cancel ticket.php'"/> <?php
      }
      else
      {
        $jdate="";
        $tot = 0;
        $bus_Id;
        $name="";
        $status="";
        $flag="";
        $contact="";  $hudai = 0;
        while($row0=mysqli_fetch_assoc($r0))
        {
          $jdate = $row0["date"];
          $bus_Id = $row0["bus_Id"];
          $name = $row0["name"];
          $flag=$row0["status"];
          $contact=$row0["contact"];
          $m = (int)$row0["seat_no"];
          $dv = $m/4; $rm = $m%4; if($rm==0) $rm = 4;
          $ch = chr(65+$dv);
          $stn = ""; if($hudai==1) $stn.=", ";
          $stn.=$ch; $stn.="-"; $stn .=(string)$rm;
          $sts.=$stn; $hudai = 1;

        }
        $sts.=" )";

        if($flag=="no") $status = "NOT PAID";
        else $status = "PAID";

        $date = date('Y-m-d');
        if($date>=$jdate)
        {
          echo '<script>alert("This ticket is not eligible for cancelling")</script>';
          ?><meta http-equiv="refresh" content="0; URL='cancel ticket.php'"/> <?php
        }
        else
        {
          $q1 = "SELECT * FROM buses WHERE bus_Id='".$bus_Id."'";
          $r1 = mysqli_query($conn, $q1);
          $type; $from=""; $to=""; $time="";
          while($row1=mysqli_fetch_assoc($r1))
          {
            $type = $row1["type"];
            $from = $row1["from_city"];
            $to = $row1["to_city"];
            $time = $row1["time"];
          }
          if($type=="AC") $tot = 800*$n0;
          else $tot = 500*$n0;

         // echo $tot;

$date1 = $date;
$date2 = $jdate;

$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$prcntg=0;
if($days==1){
  $prcntg = 30;
}
elseif ($days==2) {
  $prcntg = 50;
}
else if ($days==3) {
  $prcntg = 70;
}
else if ($days==4) {
  # code... 
  $prcntg = 80;
}
else{
  $prcntg = 100;
}

$rfnd = ($prcntg*(int)$tot)/100;

          ?>
            <div class="box2">
              <table border="1px solid lightgrey" width="100%">
              <tr><td>Name of Passenger</td> <td><?php echo "       ". $name; ?></td>
              <td>Contact Number</td> <td><?php echo "          ". $contact; ?></td></tr>
              <tr><td>Date of Journey</td>  <td><?php echo "        ". $jdate; ?></td>
              <td>Total Number of Seat</td> <td><?php echo "    ". $n0. " ". $sts; ?></td></tr>
              <tr><td>Broading From</td> <td><?php echo "    ". $from; ?></td>
              <td>Destination</td> <td><?php echo "    ". $to; ?></td></tr>
              <tr><td>Coach ID</td>  <td><?php echo "               ". $bus_Id; ?></td>
              <td>Coach Type</td> <td><?php echo "              ". $type; ?></td></tr>
              <tr><td>Total Amount of Money</td> <td><?php echo "   ". $tot; ?></td>
              <td>Payment Status</td> <td><?php echo "          ". $status?></td></tr>
            

              <tr><td>Departure Time</td> <td><?php echo "          ". $time?></td>
                <td><a style="color: red; font-size: 20px;">Tk <?php echo $rfnd; ?> will be refunded.</a></td> <td><a href="cancel ticket3.php?booking_id=<?php echo $id; ?> & status=<?php echo $flag; ?>" style="color: red; font-size: 20px;">Cancel Ticket?</a></td></tr>
            </table>
              
            </div>

          <?php
        }
      }
    }

  ?>

  <br><br><div class="box">

    <h3 style="color: red"><u>Ticket Cancellation</u></h3>
    * You must cancel your ticket one day before the bus departure date.<br>
    * You will be refunded 30% of your money if you cancel ticket 1 day before.<br>
    * You will be refunded 50% of your money if you cancel ticket 2 days before.<br>
    * You will be refunded 70% of your money if you cancel ticket 3 days before.<br>
    * You will be refunded 80% of your money if you cancel ticket 4 days before.<br>
    * You will be refunded 100% of your money if you cancel ticket 5 or more days before.<br>
    * Give your BOOKING ID below to calcel your ticket<br>
  </div><br><br>
  
</div>
    

<br><br><br><hr>

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

  <div class="tmp6">
    Developed and Maintained by <br><br>
    Md.Hasnat Hasan Prachurzo <br>
    Atia Sultana Liman<br><br>
  </div>

</div>
<hr>

</body>
</html>
