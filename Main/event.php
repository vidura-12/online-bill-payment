<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleall.css">
  <link rel="stylesheet" href="style/dashboard.css"> <!-- Link to your CSS stylesheet -->
  <script src="./script.js"></script> <!-- Link to your JavaScript file -->
</head>
<body>
<nav class="navbar">
    <a href="Home.html"><img id="logo" src="image/profile/logo.png"></a> 
    <div class="list">
      <ul>
        <li><a href="Home.html">Home</a></li> 
        <li><a href="About Us.html">About</a></li> 
        <li><a href="event.php">Dashboard</a></li> 
        <li><a href="Bill amount.php">Billing</a></li>
        <li><a href="Feedback.php">Feedback</a></li> 
        <li><a href="Contac us.html">Contact Us</a></li> 
      </ul>
    </div>

    <a href="profile.php"><img id="user" src="image/profile/userprofile.png"></a> 
    <div class="user-buttons">
  
      <a href="sign in.html"><button class="signin-button">Log In</button></a>
    
      <a href="sign up.html"><button class="signup-button">Sign Up</button></a>
    </div>
    <div class="search-container">
      <input type="text" placeholder="Search...">
      <button type="submit">Search</button>
    </div>
  </nav>

	<h1><center>Welcome !<center></h1>
<div style="text-align: right ; margin-right: 20px;">
  <button><a href = "Eventadd.php" >Add Event</a></button>
</div>
	<table border="2" width="90%">
	  
		<tr>
		  <th >Event ID</th>
		  <th >Event Name</th>
		  <th >Location</th>
		  <th >Date</th>
      	  <th>Details</th>
		</tr>
	  </thead>
	  
		<?php 
		  include"connection.php";
		  
			$query="SELECT * FROM addevents ";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				?>
				<tr>
					  <td><?php echo $row['Event_ID'] ?></td>
					  <td><?php echo $row['Event_Name'] ?></td>
					  <td><?php echo $row['Location'] ?></td>
					  <td><?php echo $row['Date'] ?></td>
            <td><?php echo $row['Details'] ?></td>
				</tr>
				
				<?php
			}
		?>
  </tbody>
</table>
</div>
<br>
  <br>
  <br>
  <br>
  <h2 style="color:black;text-align:center;font-size:28px;"> Most favourite Events </h2><br><br><br>
  <style>
  .photo-container {
    display: flex;
    justify-content: space-between; 
  }

  .photo {
    width: 30%; 
    max-width: 100%;
  }
</style>

  <div class="photo-container">
  <img src="images/sineth.jpg" alt="Photo 1" class="photo">
  <button style = "margin-right:800px;height: 40px; margin-top:100px;" onclick = "myFunction('2023 joe birthday')" id = "birthday">2023 joe birthday</button>
 
</div>

<script>
function myFunction(data){

	if(data ==="2023 joe birthday"){

		document.getElementById("birthday").innerHTML="Date:2001/2/18 ";
	}

}
</script>

<br><br><br>
  <footer>
    <nav class="foter">
      <div class="left">
        <p>Follow Us</p>
        <img src="image/footer/fb.png" alt=""> <!-- Facebook icon -->
        <img src="image/footer/instra.png" alt=""> <!-- Instagram icon -->
        <img src="image/footer/twitter.png" alt=""> <!-- Twitter icon -->
        <img src="image/footer/youtube.png" alt=""> <!-- YouTube icon -->

        <div><a href="notify@email.com">notify@email.com</a></div> <!-- Contact email -->

      </div>

      <center>
        <div class="card">
          <img src="image/footer/visa.png" alt=""> <!-- Visa logo -->
          <img src="image/footer/master.png" alt=""> <!-- Mastercard logo -->
          <img src="image/footer/american.png" alt=""> <!-- American Express logo -->
          <img src="image/footer/discover.png" alt=""> <!-- Discover logo -->
        </div>
      </center>
      
    </nav>
    <div class="app">
      <p>Download App</p>
      <img src="image/footer/app.png" alt="">
  </div>
  </footer>
  <div id="copyrights">

    &copy;<span> MLB_WD_05.02_01</span>
</div>
</body>
</html>


