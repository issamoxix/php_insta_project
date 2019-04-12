<?php
$conn = new mysqli("localhost","root","","test");
$sql = "SELECT * from followers_n ";
$query = $conn->query($sql);
$q=$conn->query($sql);
while($row = $query->fetch_assoc()){
	str_replace('Followers', ' ',$row['if_f']);
	echo "<div>";
	echo 'user name => '.$row['ig_n'].'<br>';
	echo 'followers => '.str_replace('Followers','',$row['if_f']).'<br>';
	echo "</div>";
}
echo "<div class='d'>";
$m = array();
$k = array();
$w = array();
while($row = $q->fetch_assoc()){
	if(strpos(str_replace('Followers','',$row['if_f']),'m')){
		echo "<p id='m'>".$row['ig_n']."</p>";
		$y = str_replace('m','',str_replace('Followers','',$row['if_f']));
		settype($y, 'int');
		$m[$row['ig_n']]=$y;
	}elseif(strpos(str_replace('Followers','',$row['if_f']),'k')){
		echo "<p id='k'>".$row['ig_n']."</p>";
		$y =  str_replace('k','',str_replace('Followers','',$row['if_f']));
		settype($y, 'int');
		$k[$row['ig_n']]=$y;
	}else{
		echo "<p id='w'>".$row['ig_n']."</p>";
		$y = str_replace('Followers','',$row['if_f']);
		settype($y, 'int');
		$w[$row['ig_n']]=$y;
	}
}
// print_r($k);
// print_r($w);
arsort($m);
arsort($k);
arsort($w);
$Sm= sizeof($m,0);
$Sw = sizeof($w,0);
$Sk = sizeof($k,0);
$T=$Sm+$Sw+$Sk;
#8 1 2 3 4 
?>
</div>
<style type="text/css">
	#m {
		color:red;
	}
	#k {
		color:green;
	}
	#w{
		color:blue;
	}
	.ranking {
		position:absolute;
		left: 22em;
   		top: 0px;
	}
</style>
<div class='ranking'><h2>Ranking</h2>
<?php

for ($i=1; $i <=$T ; $i++) { 
	if(key($m) != ''){
	echo '<b>'.$i.'- </b>'.key($m).'<br>';
	next($m);
	}elseif(key($m)=='' && key($k) !=''){
		echo '<b>'.$i.'- </b>'.key($k).'<br>';
		next($k);
	}elseif(key($m)=='' && key($k)==''){
		echo '<b>'.$i.'- </b>'.key($w).'<br>';
		next($w);
	}
	
	
}


?>
</div>