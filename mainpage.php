<?

	session_start();
	
	include("connection.php");
	
	// This code loads the diary text from the DB into the textarea, so the user doesn't think they have lost it when they reload the page or log out and log back in.
	$query = "SELECT diary FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";
	
	$result = mysqli_query($link, $query);
	
	$row = mysqli_fetch_array($result);
	
	$diary = $row['diary'];

?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  <style>
  
  .top {
  	
	  margin-top: 80px;

  }
  
  .center {
  	
	  text-align:center;
	
  }
 
  .bold {
  	
	  font-weight:bold;
	  font-size: 18px;
	
  }
  
  .form-top {
  	
	  margin-top: 50px;
	
  }
  </style>
  
  </head>
  <body>
  
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	
	<div class="container-fluid">
		
		<div class="navbar-header pull-left">
			
			<a class="navbar-brand" href="#">Secret Diary</a>
			
		</div>
		
		<div class="pull-right" id="collapse-nav">
			
			<ul class="navbar-nav nav">
				
				<li><a href="index.php?logout=1">Log Out</a></li>
				
			</ul>
			
		</div> <!-- /.navbar-collapse -->
		
	</div><!-- /.container-fluid -->
	
</nav>
  
  
  <div class="container-fluid">
  
   <div class="row">
	
	<div class="col-md-8 col-md-offset-2 top">
		
		<textarea class="form-control"><?php echo $diary; ?></textarea>
	
	</div>
  
  </div>
  

 
 </div><!-- /.container -->
    
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
	
	$("textarea").css("height",$(window).height()-120);
	
	$("textarea").keyup(function() {
		
		//Using post function for simplicity here, but ajax function would be better as then could tell users if internet connectivity goes down, for example, so they don't lose anything they have typed.
		//Updates the updateddiary.php with the textarea value (i.e. what the user inputs), which then in turn updates the DB
		$.post("updatediary.php", {diary:$("textarea").val()} );
		
	});
	
	</script>
  </body>
</html>
