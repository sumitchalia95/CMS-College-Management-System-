<html>
<head>
   <script type="text/javascript" language="javascript">
    function validation()
	{
	  var title=document.myform.title.value;
	  if(title=="")
	  {
		  alert("Title should not be empty");
		  return false;
	  }
	  len=title.length;
	  for(i=0;i<len;i++)
	  {
		  x=title.charAt(i);
		  if(!((x>='A'&& x<='Z')||(x>='a'&& x<='z')))
		  {
			  alert("TITLE must be contain character only!");
			  return false;
		  }
	  }
	  
	  return true;
	}

   </script>
    
</head>


<body>
<?php
if(!isset($_REQUEST['Submit']))
{
	echo"
     	<form  action='Add.php' name='myform' method='Post' onSubmit='return validation();'>
	     <label>TITLE</label>
	    <input type='text' name='title'>
	    <input type='submit' name='Submit' Value='Add'>
		</form>
		";
}
else
{
	$link=mysqli_connect("localhost" ,"root" ,"","vikasproject");
	$TITLE=$_REQUEST['title'];
	$result=mysqli_query($link,"INSERT INTO classes(Title) VALUES ('$TITLE')");
	if($result)
	{
		header("location:ShowAll.php");
	}
	
	
	
}

?>
</body>
</html>