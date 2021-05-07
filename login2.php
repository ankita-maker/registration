<?php
session_start();
$m=$_POST['a'];
$o=$_POST['b'];

$_SESSION['name']=$m;
$_SESSION['pswd']=$o;

mysql_connect("localhost","root","");
mysql_select_db("net");

$query="SELECT * FROM student WHERE name='$m' AND password='$o'";
$result=mysql_query($query);
$row=mysql_num_rows($result);

$query1="SELECT * FROM admin WHERE name='$m' AND password='$o'";
$result1=mysql_query($query1);
$row1=mysql_num_rows($result1);


if(name==""||pswd=="")
{
	echo " Plz fill all fields ";
	echo "<a href='login.php'> Try Again</a>";
}
else if($row1!=0)
{
	$query="SELECT * FROM student";
	$result=mysql_query($query);
		echo"<table border='6' width='75%'>";
	    echo"<tr height='5'>";
		echo"<td width='20%'>NAME</td>";
		echo"<td width='20%'>EMAIL</td>";
		echo"<td width='20%'>PASSWORD</td>";
		echo"<td width='20%'>PHONE</td>";
		echo"<td width='20%'>CONFIRMATION</td>";
		echo"</tr>";
	    echo"</table>";
	while($row=mysql_fetch_array($result))
	{	
		echo"<table border='1' width='75%'>";
	    echo"<tr height='5px'>";
		echo"<td width='20%'>".$row[0]."</td>";
		echo"<td width='20%'>".$row[1]."</td>";
		echo"<td width='20%'>".$row[2]."</td>";
		echo"<td width='20%'>".$row[3]."</td>";
		echo"<td width='20%'>".$row[4]."<a href='update.php?new=$row[0]'>Update</a></td>"; //<input type='hidden' name='' value=''> using form 
		echo"</tr>";
	    echo"</table>";
	}
	echo"<a href='logout.php'>LOGOUT</a>";
}
else
{
	if($row==0)
	{
		echo " First Register From <a href='form.php'><br> This Link</a>";
	}
	else
	{
		$result=mysql_query("SELECT confirmation FROM student WHERE name='$m' AND password='$o'");
		$row=mysql_fetch_array($result);
		if($row[0]==1)
		{
			echo " Successfully Logged In ";
			echo " (You are Confirmed !!!) ";
		}
		else
		{
			echo " (You are not Confirmed) ";
		}
		echo"<center><a href='logout.php'>LOGOUT</a></center>";

	}
}

?>