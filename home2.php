<?php
session_start();
require 'config.php';

// get current user from database
if (isset($_SESSION['user-id-session'])) {
    $id = filter_var($_SESSION['user-id-session'], FILTER_SANITIZE_NUMBER_INT);
    $statement = $conn->prepare('SELECT * FROM user WHERE id = :id ');
    $statement->bindValue(':id', $id); 
    $statement->execute();
    $statement_result = $statement->fetch(PDO::FETCH_ASSOC); 

  }else{
    header('location: ' . DOMAIN . 'register.php');
    exit();
  }


?>

<DOCTYPE html>
    <html lang="en">
    
   
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <title>The Avatar Restaurant</title>
        <link rel="stylesheet" href="home2style.css">
    </head>

    
    <body>
    <!-- Top Bar-->
        <header>
            <img src="Logo.png" width="80px" height="80px">
            <h2 class="logo">The Avatar Restaurant</h2>
            <nav class="navigation">
                <a href="#home"><b>Home</b></a>
                <a href="#About-Us"><b>About Us</b></a>
                <a href="#regulation"><b>Reservations</b></a>
            </nav>
			<div class="button">
           <button class="btnLogin-popup">LOGOUT</button>
       </div>
        </header>

		<section id="home">
        <div class="container">
                <div class="open">
				<img src="pic.jpg" alt="Restaurant Image 1">
				<h2 class="logo"> Hello! <?php echo $statement_result['fullname'] ?> </h2>
                <p>Dishes that made you fill your desires and cravings. Services that satisfy you throughout your whole dinner. 
                   <br><br>Make your reservations through online and reserve a table now.<br>
		
<button id="reserveButton" class="btnLogin">RESERVE NOW!</button></p>
       </div>
	   
            </div>
		<div class="cont">
		    <div>
		        <h2>Gallery</h2>
				<table>
				<tr>
                    <td><img src = "food1.jpg" width="220px" height ="180px"></td>
                    <td><img src = "food2.jpg" width="220px" height ="180px"></td>
                    <td><img src = "res1.jpg" width="220px" height ="180px"></td>
                    <td><img src = "res2.jpg" width="220px" height ="180px"></td>
                </tr>
				<tr>
                    <td><img src = "food3.jpg" width="220px" height ="180px"></td>
                    <td><img src = "food4.jpg" width="220px" height ="180px"></td>
                    <td><img src = "res3.jpg" width="220px" height ="180px"></td>
                    <td><img src = "food5.jpg" width="220px" height ="180px"></td>
                </tr>
                </table>
		    </div>
		</div>
    </section>
	
	 <div id="popupForm" class="popup">
	    <button id="closeButton" class="close">&times;</button>
	  <h2>Reservation Form</h2>
      <form action="reserve.php" method="post">
        <form class="container" id="reservationForm">
		 <div class="input-box">
		<label for="email">Email</label>
        <input type="text" id="email" name="email" required>

        <label for="table">Select Table:</label>
        <select id="table" name="tables" required>
            <option value="">Select Table</option>
            <option value="Table 1 for 2 people">Table 1 for 2 people</option>
            <option value="Table 2 for 4 people">Table 2 for 4 people</option>
            <option value="Table 3 for 6 people">Table 3 for 6 people</option>
            <option value="Table 4 for 8 people">Table 4 for 8 people</option>
            <option value="Table 5 for 10 people">Table 5 for 10 people</option>
            <option value="Table 6 for 12 people">Table 6 for 12 people</option>
        </select>
		</div>
		 <div class="input-box">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>
		</div>
		 <div class="input-box">
        <label for="number">Number of People:</label>
        <input type="number" id="number" name="number" min="1" required>

        <label for="occasion">Select Occasion:</label>
        <select id="occasion" name="occasion" required>
            <option value="">Select Occasion</option>   
            <option value="Celebration">Casual</option>
            <option value="Celebration">Celebration</option>
            <option value="Private">Private</option>
            <option value="Meeting">Meeting</option>
        </select>
		</div>
		<div class="input-box">
		<label for="contact">Contact number</label>
        <input type="number" id="contact" name="contact"required>
		</div>
        <input type="submit" value="Submit">
    </form>
    </form>
	
</div>
	
	<section id="About-Us">
	<div class="ner">
                <div>
				<img src="res2.jpg" alt="Restaurant Image 1">
				<h2>Our Story</h2>
                <p>We started as a small diner that mainly offers healthy foods and our cabbages dishes became the best seller. 
				We gradually made new recipes that became popular to the customers 
                   <br><br>Just from group of friends that started a business only to gain income become heals to the hearts and tummy of the 
				   customers as they enjoy their food. With the good feedback, the staffs and the owner became enthusiastic in doing their jobs.
				</p>
       </div>
            </div>
		<div class="click">
		    <h2>Goal of Foundation</h2>
			
			<table>
			    <tr>
				    <td><img src = "p1.jpg" width="100px" height ="150px"></td>
                    <td><img src = "p2.jpg" width="100px" height ="150px"></td>
				    <td><img src = "p3.jpg" width="100px" height ="150px"></td>
                    <td><img src = "p4.jpg" width="100px" height ="150px"></td>
				</tr>
			</table>
		
		<div>
		<p>The goal of foundation of the restaurant aside from making income is to serve the dishes from the difference home 
			towns of the owners. They're friends that came from different places and they decided to make a place where the food from 
			their home towns will reach in the city.<br><br>
			The owners worked so hard to impliment and distribute the dishes to the people and they have in mind that doing this will 
			merge the people from different towns searching the foods of their childhood
			</p>
		</div>
		</div>
		<div class="cross">
		    <div>
		        <h2>Gallery</h2>
				<table>
				<tr>
                    <td><img class="out" src = "food1.jpg" width="220px" height ="180px"></td>
                    <td><img class="out" src = "food2.jpg" width="220px" height ="180px"></td>
                    <td><img class="out" src = "res1.jpg" width="220px" height ="180px"></td>
                    <td><img class="out" src = "res2.jpg" width="220px" height ="180px"></td>
                </tr>
                </table>
		    </div>
		</div>
	</section>	  
	<section id="regulation">
	    <div class="heh">
                <div>
				<h2>Regulations</h2>
                <p><i><u>Reservation Relocation</u></i> – Avatar Restaurant will only hold your table for a maximum of 20 minutes after your reservation 
				time, at which time we’ll release the table to other diners in the event of no show or late arrival.
				<br><br>Avatar Restaurant holds the right to relocate your reservation without any guarantee of relocation time. In case 
				you would like to have pre-dinner drinks in the Bar and Lounge area, we advise you to come 30 minutes – 1 hour in advance 
				prior to your reservation time.<br><br><i><u>Dress Code</u></i> – Our dress code is smart casual.<br><br><i><u>Bring Your Own</u></i> – Avatar restaurant 
				is famous for its exquisite food and extensive drinks menu. Therefore, consumption of own brought food or beverage is not 
				allowed unless pre authorized.<br><br><i><u>Table Allocation</u></i> – Although we always strive to ensure you the table of your 
				preference, we cannot guarantee this at all times.<br><br><i><u>Smoking Area</u></i> – Our restaurant is a non-smoking area. However, 
				guests are allowed to smoke at the outdoor patio area. <br><br><i><u>Children</u></i> – The restaurant strongly advises diners who bring along their children to ensure that the children are seated at the table during dinner and act in the manner where they shall not disturb other diners in the restaurant. As we a predominantly an adult venue we do not provide facilities such as high chairs and changing tables.
       </div>
            </div>
			<div class="lunox">
			<h2>Reviews</h2>
		</div>
		<div class="magic">
			<div>
			    <img src="p4.jpg" alt="Restaurant Image 1">
				<h3>Michael Haress</h3>
			
                <p>Accomodating Staff and enjoyable experience. Immediate response to the reservation and verification of the register. 
                   <br><br>The food are tasty, definitely coming again.
				</p>
			</div>
			<div>
			    <img src="p2.jpg" alt="Restaurant Image 1">
				<h3>Sofia Chest</h3>
			
                <p>Accomodating Staff and enjoyable experience. Immediate response to the reservation and verification of the register. 
                   <br><br>The food are tasty, definitely coming again.
				</p>
			</div>
			<div>
			    <img src="p1.jpg" alt="Restaurant Image 1">
				<h3>Greg Montalban</h3>
			
                <p>Accomodating Staff and enjoyable experience. Immediate response to the reservation and verification of the register. 
                   <br><br>The food are tasty, definitely coming again.
				</p>
			</div>
		</div>
	</section>
	<footer>
	    <h3>THE AVATAR RESTAURANT</h3>
		<img src="Logo.png" width="80px" height="80px">
	    <p>Contact us: theavatarrestaurant@gmail.com | Phone: 123-456-7890</p>
		
		<div class="remember-forgot">
                        <a href="#">Terms and Conditions</a>
                       <a href="#">Privacy Policy</a>
        </div>
	</footer>
		
		<script src="home2js.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	</body>
</html>