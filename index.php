<?php
	$conn=new mysqli("localhost","root","","assignment");
	$conn->select_db("assignment") or die ($conn->error);
	if(isset($_POST['submit']))
	{
	$name=$_POST['name'];
	$comm=$_POST['comment'];
	
	$sql="INSERT INTO comment VALUES('$name','$comm')";  
	if($conn->query($sql)===TRUE)
	{
		echo "<script>alert('new record created')</script>";
	}
	else
	{
		echo "<script>alert('query not correct')</script>";
	}

}
$result=$conn->query("SELECT * from comment");
if ($result->num_rows>0) 
{
  while ($row = $result->fetch_assoc()) 
  {
  	$name=$row['Name'];
  	$comm=$row['Comment'];
     echo "<div class='jumbotron' style='padding:1%; border:10px solid burlywood; border-radius: 10px'>".$name."</br>".$comm."</div>";
    
}
}
    else
    {
     echo "<script>alert('0 result')</script>";
    }
?>
<html>
<head>
<title>
Discussion Board
</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<style type="text/css">
	td
	{
		padding: 5%;
	}
	table
	{
		width: 30%;
		height: 30%;
	}


</style>
</head>
<body><center>
<form method="POST">
<table>
<tr><td>
	    Name </td><td><input type="text" class="form-input" name="name" required="required" />
	</td>
</tr>
	<tr>
	<td>Comment </td><td><textarea name="comment"></textarea>
	  </td>
	  </tr>
	  <tr><td colspan="2"><center><input type="submit" class="btn btn-primary" value="submit" name="submit"></center>
</td>
</tr>
</table>
</form>
</center>
</body>
</html>
