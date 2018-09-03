<?php

include 'db.php';

?>

<!DOCTYPE html>
<html>

<Head>
<title>Chat Application</title>
<link rel="stylesheet" href="style.css" media="all" />
<script>
 function ajax(){
	var req = new XMLHttpRequest();
	req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status == 200){
			document.getElementById('chat').innerHTML = req.responseText;
			
		}
	}
	req.open('GET','chat.php',true);
	req.send();
 }
</script>
</Head>

<body onload="ajax();">

<div id="container">
	<div id="chat_box">
	<div id="chat"></div>
		
	</div>
	
		<form method="post" action="index.php">
			<input type="text" name="name" placeholder="enter name" />
			<textarea name="message" placeholder="enter message"></textarea>
			<input type="submit" name="submit" value="Send it"/>
		</form>
			<?php
			if(isset($_POST['submit'])){
					$name = NULL;
					$name= $_POST['name'];
					$msg = $_POST['message'];
					
					if($name){
					$query = "INSERT into chat(name,msg) values('$name','$msg')";
					$run = $con->query($query);
					}
					if($run){
						echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
					}
			}
			?>
			
</div>
</body>
</html>