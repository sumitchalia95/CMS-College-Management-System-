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
     	<form  action='StreamAdd.php' name='myform' method='Post' onSubmit='return validation();'>
	     <label>TITLE</label>
	    <input type='text' name='title'><br>
	     <label>CLASSID</label>
	    <input type='text' name='classid'><br>
	    <input type='submit' name='Submit' Value='Add'>
		</form>
		";
}
else
{
	$link=mysqli_connect("localhost" ,"root" ,"","vikasproject");
	$TITLE=$_REQUEST['title'];
	$CLASSID=$_REQUEST['classid'];
	$result=mysqli_query($link,"INSERT INTO streams(Title,ClassId) VALUES ('$TITLE','$CLASSID')");
	if($result)
	{
		header("location:StreamShowAll.php");
	}
	
	
	
}

?>
</body>
</html>