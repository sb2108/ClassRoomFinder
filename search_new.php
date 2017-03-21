<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    
    $day  = $_POST['day'];
    $time = $_POST['time'];
    //include('connect.php');
    
    if (!empty($day) && !empty($time)) {
        
        include('connect.php');
        $r = mysqli_query($dbc, "SELECT room_no FROM ".$day." WHERE ".$time." IS NULL ");
        	
		//echo "<tr><td align='left'>".$row['room_no']."</td>";}
			
        
    
//$num=mysql_numrows($result);}
        //$row = mysqli_fetch_array($r);

        }

       /* $query = "SELECT `room_no` FROM `monday` WHERE 1";

        $r = mysqli_query($dbc, $query);
        echo strval($r);

        //"SELECT `RoomNo` FROM `".$day."` WHERE `".$time."`=NULL"
        //$r = mysqli_query($dbc, "SELECT * FROM ".$day);
        
        $result = mysqli_fetch_array($r);
        //echo $result;
        //echo ($result!=NULL)?mysqli_fetch_assoc($r):"Some Went Wrong";
        
       /* if ($result != NULL) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($r)) {
                echo "Room no: " . $row["RoomNO"] . "<br>";
            }*/
        else 
            echo "No classes are free";
        
        
    }


?>



<!DOCTYPE html>
<html>
<head>
	<title>Search Room</title>
    <style>
        body{
            background: #212121;
            color:#fafafa;
            font-family: sans-serif;
        }
        .container{
            display: flex;
            align-items:center;
            justify-content: center;
            margin-top: 100px;
        }
        input[type='text'],input[type='password'],input[type='submit'],select{
            padding: 10px;
            background: transparent;
            border: 2px solid #fcbe32;
            border-radius: 4px;
            width: 400px;
        }
        input[type='submit']{
            background: #fcbe32;          /*gives the blue color to the button*/
            transition: 0.25s all;
        }
        input[type='submit']:hover{
            background: #fff;
            color:#444;
            border-color:#fff
        }
        select{
            color:#00bcd4;
        }
        ul.available-rooms{
            list-style: none;
            padding: 0px;
        }
        ul.available-rooms li{
            height:100px;
            display: flex;
            align-items:center;
            justify-content: center;
            background: #00bcd4;
            border-radius: 5px;
            color:#444;
            font-weight: bold;
            margin:5px 0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="search.php" method="post">
            <h1 style="text-align:center">Enter the day and time</h1>
            <p><span style="display:block; margin-bottom:20px;">Day:</span>
               <select name="day">
					<option value="monday">Monday</option>
					<option value="tuesday">Tuesday</option>
					<option value="wednesday">Wednesday</option>
					<option value="thursday">Thursday</option>
					<option value="friday">Friday</option>
					<option value="saturday">Saturday</option>
			   </select></p>

			   <p><span style="display:block; margin-bottom:20px;">Time:</span><select name="time">
					<option value="one">10-11</option>
					<option value="two">11-12</option>
					<option value="three">12-1</option>
					<option value="four">1-2</option>
					<option value="five">2-3</option>
					<option value="six">3-4</option>
					<option value="seven">4-5</option>
			   </select></p>
		<p><input type="submit" name="submit" value="Submit" /></p>	   
        <div class="results">
            <center><h2>Available Rooms</h2></center>
            <ul class="available-rooms">
            <?php while($row = mysqli_fetch_array($r)) {?>
            <li class="room"><?php echo $row['room_no']; ?><a onclick="bookThis(<?php echo $row['room_no'] ?>)">Book</a></li>
            <?php } ?>
            </ul>
        </div>
        <script>
        
        function bookThis(room_no){
            var day = $('select.day');
            console.log(day);
            var req = new XMLHttpRequest();
            console.log("Brav");
            req.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText); 
                }
            };               
            req.open('POST',"book_new.php?room_no="+room_no,true);
            req.send();
        }
            
        </script>
        <p><input type="submit" name="book" value="Book Room" /></p>
        <p><input type="submit" name="Refresh" value="Refresh Every Week" /></p>

    </div>
    <script type="text/javascript" src="jquery-3.2.0.js"></script>
</body>
</html>