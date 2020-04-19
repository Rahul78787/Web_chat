<?php 
session_start();
include 'dbh.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>

<div id="main">
	<h1 style="background-color: #6495ed; color: white;"> <?php echo $_SESSION['name'] ?> --ONLINE</h1>

	<div class="output">
    <?php $sql="SELECT * FROM posts";
    $result=$conn->query($sql);

    if($result->num_rows>0){
    	// output data if each row
    	while($row=$result->fetch_assoc()){
    		echo "".$row["name"]." "."::".$row["msg"]."--".$row["date"]."<br>";
    		echo "<br>";
    	}
    }else{
    	echo "0 results";
    }
  $conn->close();
?>


	</div>




	<form method="post" action="send.php">
		<textarea name="msg" placeholder="Type to send the message....." class="form-control"></textarea><br>
		<input type="submit" name="send">
	</form>
	<br>

	<form action="logout.php">
		<input  style="width: 100%;background-color: #6495ed; color:white; font-size :20px; "type="submit" type="submit" value="Logout">
	</form>
</div>

</body>
</html>