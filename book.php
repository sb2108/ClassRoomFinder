<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    
    $day  = $_POST['day'];
    $time = $_POST['time'];
    $room_no = $_POST['room_no'];


    //include('connect.php');
    
    if (!empty($day) && !empty($time) && !empty($roomno)) {
        
        include('connect.php');

        $r = mysqli_query($dbc, "SELECT ".$time."FROM ".$day." WHERE room_no =".$room_no);
        while($row = mysqli_fetch_array($r))
        {echo $row['time'];}

            
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
        input[type='text']{
            background: #fcbe32;          /*gives the blue color to the button*/
            transition: 0.25s all;
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
        <form action="book.php" method="post">
            <h1 style="text-align:center">Enter the day ,time and room to book</h1>
            <p><span style="display:block; margin-bottom:20px;">Day:</span><select name="day">
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
               
               <p><span>Room No:</span> <input type="text" name="room_no" size="20" maxlength="50" /></p>

		<p><input type="submit" name="submit" value="Submit" /></p>
        <div class="results">
            <center><h2>Available Rooms</h2></center>
            <ul class="available-rooms">
            <?php while($row = mysqli_fetch_array($r)) {?>
            <li class="room"><?php echo $row[$time]; ?></li>
            <?php } ?>
            </ul>
        </div>
        	
        </div>
</body>
</html>   
