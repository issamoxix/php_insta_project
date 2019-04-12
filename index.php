
<!DOCTYPE html>
<html>
<head>
	<title>Insta Chekcer</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php $page1 ='
	<div>
		<form action="#" method="POST">
			<input type="text" name="ig_n" placeholder="Ig Name" required/>
			<input type="submit" />
		</form>
	</div>
	';?>
</body>
<center><b>
</html>
<?php
$conn = new mysqli("localhost","root","","test");
if(!isset($_POST['ig_n'])){
echo $page1;

}else{
$code  = shell_exec("py insta.py 1 ".$_POST['ig_n']);
$name = $_POST['ig_n'];

$sqlXX= "SELECT * FROM followers_n WHERE ig_n='$name'";
$qx = $conn->query($sqlXX);
$row1 = $qx->fetch_assoc();
if($row1['ig_n']==$name){
	
}else{
	$sql22 = "INSERT INTO followers_n(ig_n, if_f) VALUES ('$name','$code')"; #Insert data to dbs 
	$q = $conn->query($sql22);
}
#CHECK if the data is already in the dbs


#if the followers number are equale or nah
if($row1['if_f']==$code){
	echo $code;
}elseif($row1['if_f']!=$code){
	$sqlin="UPDATE  followers_n SET if_f='$code' WHERE ig_n='$name'";
	$quy=$conn->query($sqlin);
	echo $code;
}


echo "<br><a href='http://localhost/dbc/'>Click Here to go back</a><br>";
}
$sql = "SELECT * FROM followers_n";
$query = $conn->query($sql);
echo "<table><tr><th>id</th><th>Name</th><th>Followers </th><th>Option</th></tr><tr>";
$i=1;
while($rowxx = $query->fetch_assoc()){	
	echo "<form action='#' method='POST'>";
	echo "<td>".$i++."</td><td>".$rowxx['ig_n']."</td><td>".$rowxx['if_f']."</td><td><input type='hidden' name='del' value='".$rowxx['ig_n']."'/><input type='submit' value='Delete' />";
	echo "</tr>";
	echo "</form>";
}

echo "</table>";
echo "</center>";
if(!isset($_POST['del'])){

}else{
	$del = $_POST['del'];
	$delteq="DELETE FROM followers_n WHERE ig_n ='$del'";
	$conn->query($delteq);
}
?>