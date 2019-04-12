<?php 			
$conn = new mysqli("localhost","root","","test");
$sql="UPDATE followers_n SET if_f=".$_POST['ig_n']." WHERE ig_n='issam'";
$sql=$conn->query($sql);




?>