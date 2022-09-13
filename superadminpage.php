<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kshaktriya</title>
    <script src="assets/script/jquery.min.js"></script>
</head>

<body>
    <style>
            .button {
  background-color: rgb(4, 107, 217); /* Green */
  border: none;
  color: white;
  padding: 10px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  width:80px;
  border:1px solid white;
  cursor:pointer;
  border-radius:5px;
}
.button:hover{
    filter:brightness(1.2);
}
    </style>
    <a href="?logout='yes'" class="button" onclick="return confirm('if you want close the session')">Log Out</a>
    <span class="closebtn button"  closeoption="container">Request</span>
        <span class="closebtn button" closeoption="event_form">Add Events</span>
    <?php 
    include 'db.php';
    session_start();
    if (isset($_GET['logout'])) {
        session_start();
        unset( $_SESSION['kshaktriya']);
    }
    if (isset($_SESSION['kshaktriya'])) {
       $name=$_SESSION['kshaktriya'];
    }
    else{
        header('Location:adminlogin.php?mes=successfully logged out');
    }
    if (isset($_GET['aadmin'])) {
      $aadmin=$_GET['aadmin'];
      $sql = "UPDATE adminlogin SET status=1 WHERE id=$aadmin";

if ($con->query($sql) === TRUE) {
  echo "<script>alert('Record updated successfully')</script>";
} else {
  echo "<script>alert('Error updating record: " . $conn->error."')</script>";
}
    }
    if (isset($_GET['areject'])) {
        $aadmin=$_GET['areject'];
        $sql = "UPDATE adminlogin SET status=9 WHERE id=$aadmin";
  
  if ($con->query($sql) === TRUE) {
    echo "<script>alert('Record updated successfully')</script>";
  } else {
    echo "<script>alert('Error updating record: " . $conn->error."')</script>";
  }
      }
    ?>
    <div class="container">
    <?php include 'db.php';
        $sql="select id, admin_reg_no,admin_name ,admin_number,admin_email,admin_image from adminlogin where status ='5'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {  ?>
        
    

<ul class="responsive-table">
    <li class="table-header">
        <div class="col col-1">Reg.No</div>
        <div class="col col-2">Name</div>
        <div class="col col-3">Mobile Number</div>
        <div class="col col-4">Email</div>
        <div class="col col-4">Image</div>
        <div class="col col-4">Action</div>
    </li>


            <?php
    while($row = $result->fetch_assoc()) {  
    ?>
 <li class="table-row">
                <div class="col col-1" data-label="Job Id"><?php echo $row['admin_reg_no']; ?></div>
                <div class="col col-2" data-label="Customer Name"><?php echo $row['admin_name']; ?></div>
                <div class="col col-3" data-label="Amount"><?php echo $row['admin_number']; ?></div>
                <div class="col col-4" data-label="Payment Status"><?php echo $row['admin_email']; ?></div>
                <div class="col col-4" data-label="Payment Status"><?php echo "<img class='contact_images'cheight='50px' width='50px' src='data:image;base64,{$row["admin_image"]}'>";?></div>
                <div class="col col-5" data-label="Payment Status">
                   <a href="?aadmin=<?php echo $row['id'] ?>" class="button" onclick="return confirm('if you want close the session')"> Approve</a>  <a href="?areject=<?php echo $row['id'] ?>" class="button">Reject</a>
                </div>
            </li>
           

            <?php

    }
    }
else {
    echo "0 Request Here";
}
    ?>
      
      </ul>
    </div>

<?php
if (isset($_POST['event_form'])) {
    $ename=$_POST['ename'];
    $ecname=$_POST['ecname'];
    $ecnumber=$_POST['ecnumber'];
    $edesc=$_POST['edesc'];
    $ecat=$_POST['ecat'];
    $sql="INSERT INTO events(event_name , event_coordinator_name ,event_coordinator_number,event_description,event_category)  VALUES('$ename','$ecname','$ecnumber','$edesc','$ecat')";
    $sqlrun=$con->query($sql);
    if ($sqlrun) {
     echo "<script>alert('Event Is Created');</script>";
    }
    else{
     echo "<script>alert('Some Issue Found');</script>";
    }
 }
?>
<script>
     var count=0;
    $(".closebtn").click(function(){

        if ($('.'+$(this).attr('closeoption')).attr('style') == "display: none;") {
           
            $('.'+$(this).attr('closeoption')).removeAttr('style');
          
        } else {
            $('.'+$(this).attr('closeoption')).css('display','none');
           
        }
    });
    $('#ta').keyup(function(){
        $('.word_count').html($(this).val().length);
    });
</script>

    <style>
        .word_count_c{
            display:block;
        }
   .event_form{
    width:300px;
    border:1px solid grey;
    margin:auto;
    padding:10px 15px;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
   }
   .event_form input,.event_form textarea,.event_form select{
    padding:10px;
    margin:3px auto;
    width:300px;
   }
   input, select,textarea {

  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
    .container {
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 10px;
        padding-right: 10px;
    }


    .responsive-table li {
        border-radius: 3px;
        padding: 25px 30px;
        display: flex;
        align-items:center;
        margin-bottom: 25px;
    }

    .responsive-table .table-header {
        background-color: #95A5A6;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .responsive-table .table-row {
        background-color: #ffffff;
        box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
    }

    .responsive-table .col{
        width:20%;
    }

    @media all and (max-width: 767px) {
        .responsive-table .table-header {
            display: none;
        }

        .responsive-table li {
            display: block;
        }

        .responsive-table .col {
            flex-basis: 100%;
        }

        .responsive-table .col {
            display: flex;
            padding: 10px 0;
        }

        .responsive-table .col:before {
            color: #6C7A89;
            padding-right: 10px;
            content: attr(data-label);
            flex-basis: 50%;
            text-align: right;
        }
    }

    </style>
        <form class="event_form"  method="post">
    
    <input type="text" placeholder="Event Name..." name='ename' required>
    <input type="text" placeholder="Event Coordinator Name..." name='ecname' required>
    <input type="number" placeholder="Event Coordinator Number..." name='ecnumber' required>
     <span class="word_count_c"> <span class="word_count">0</span> &nbsp;&nbsp; Characters</span> 
    <textarea name="edesc" cols="30" id="ta" rows="10" placeholder="Event Description like some sentence@next sentence" required></textarea>
    <select name="ecat" id="" required>
    <option value="" disabled selected>Event Type</option>
        <option value="1">Technical Events</option>
        <option value="2">Non Technical Events</option>
        <option value="3">Surprises Event</option>
    </select>
    <button type="submit" name="event_form" class="button">Submit</button>
   
</form>
</body>

</html>