<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kshaktriya</title>
    <link type="text/css" rel="stylesheet" href="font.css">
    <link type="text/css" rel="stylesheet" href="index.css">
    <link type="text/css" rel="stylesheet" href="button.css">
    <script src="assets/script/jquery.min.js"></script>
</head>
<body>
    <?php include 'db.php'?>
    <section class="topbar">
    <div class="topbar-content-container">
    <div class="logo-container">
                 <img src="assets/img/bdu.png" alt="">
            </div>
            <div class="title-text">
                <h1>School of Computer Science , Engineering & Application</h1>
                <h2>Bharathidasan University , Tiruchirappalli - 622 023 , Tamilnadu , India.</h2>
            </div>
           
             </div>       
    </section>
    <section class="nav-bar">
       
    </section>
    <section class="main-container">
    
        <div class="kshaktriya">
        <div class="kshaktriya-topbar">
        <div class="logo-container">
                 <img src="assets/img/logo.png" alt="">
        </div>
            <div class="titles">
           <h1>Kshaktriya - 2K22</h1>
           <h3>Sharpen Your Swords | National Technical Symposium
     
           </h3>
           </div>
           </div>

  <div class="event-slider">
   
            <?php

$sql="select * from events where event_category='1' ";
$result = $con->query($sql);
if ($result->num_rows > 0) {  ?>
    <?php
while($row = $result->fetch_assoc()) {  
?>
<div class="card">
<p class="event-title">Technical Events</p>
<p class="event-name"><?php echo $row['event_name'] ;?> </p>
<p class='desc'><?php echo $row['event_description'] ;?></p>
<p>Event Coordinator : <?php echo $row['event_coordinator_name'] ;?></p>
<p>Contact Number : <?php echo $row['event_coordinator_number'] ;?></p>
</div>
   

    <?php

}
}
else{
echo "No Events";
}
?>

<script> 
var desc=$('.desc').html();
desc=desc.split('@');
$('.desc').html("Events Details : ")
for (let index = 0; index <desc.length; index++) {
let nonindex=index+1;
$('.desc').append("<p class='event_details'>"+nonindex+"."+desc[index]+"</p>");

}
</script>
              
            
        
  </div>
           <div class="container register-button">
                <div class="btn "><a href="registration.php">register</a></div>
                
                <!-- <div class="btn"><a href="#" >Read more 2</a></div>
				<div class="btn"><a href="#" >Read more 3</a></div> -->
            </div>
        </div>
    </section>
    <section class="contact-container" id="contact">
        
            <h2>Contact Us</h2>
            <div class="card_container">
            <?php

                  $sql = "SELECT admin_name,admin_number, admin_email,admin_image FROM adminlogin WHERE status='0'";
                  $result = $con->query($sql);
                  $i=0;
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $i++;
                        ?>

                        <div class="card" id="<?php echo $i;  ?>">
                      <div class="contact_image_container">     
                     <?php
                     echo "<img class='contact_images' src='data:image;base64,{$row["admin_image"]}'>";
                    ?> 
                    </div> 
                    <div class="card_info">
                        <p><p class='card_info_title'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
  <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z"/>
</svg> NAME </p>: <?php echo $row['admin_name'];?></p>
                        <p><p class='card_info_title'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg> Mobile</p>: <?php echo $row['admin_number'];?></p>
<p><p class='card_info_title'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
  <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
</svg> Email</p>: <?php echo $row['admin_email'];?></p>
                    </div>
                </div>                 
                   <?php
                    }
                  } else {
                    echo "0 results";
                  }
                 ?>
                
            
        </div>
    </section>
    <footer>
        Hosting : <a href="https://techcmantix.com/" target="_blank">TECHCMANTIX</a><br>
        Creater: <a href="https://wa.me/+917094376344" target="_blank">Vallatharasu Katturaja</a><br>
       <hr>
            <a href="adminlogin.php" >Admin Login</a>
        
    </footer>
</body>
</html>