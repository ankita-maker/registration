<?php
$m=$_POST['a'];
$n=$_POST['b'];
$o=$_POST['c'];
$p=$_POST['d'];
if($m==""||$n==""||$o==""||$p=="")
{
	echo "Plz fill all fields";
}
else
{
	mysql_connect("localhost","root","");
	mysql_select_db("net");
	$query="SELECT * FROM student WHERE name='$m' AND password='$o'";
	$result=mysql_query($query);
	$row=mysql_num_rows($result);
	if($row==0)
	{
		$query1="INSERT INTO student(name,email,password,phone,confirmation) VALUES ('$m','$n','$o','$p',0)";
		mysql_query($query1);
		echo " Hogaya  ";
	}
	else
	{
		echo "User Already Exists";
		$result=mysql_query("SELECT confirmation FROM student WHERE name='$m' AND password='$o'");
		$row=mysql_fetch_array($result);
		if($row[0]==1)
		{
			echo " (Confirmed !!!!)";
		}
		else
		{
			echo " (You are not Confirmed)";
		}
	}
}
echo "<a href='login.php'>Click Here To Login";
?>