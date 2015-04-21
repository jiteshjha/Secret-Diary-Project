<?php include("login.php") ?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secrets Secrets ... Shhh</title>

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
		
		<div class="navbar-header">
			
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-nav">
			
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			
			</button>
			
			<a class="navbar-brand" href="#">Secret Diary</a>
			
		</div>
		
		<div class="collapse navbar-collapse" id="collapse-nav">
			
			<form class="navbar-form navbar-right" role="login" method="post">
				
				<div class="form-group">
					
						<input type="text" class="form-control" placeholder="Email" name="loginemail" id="loginemail" value="<?php echo addslashes($_POST['loginemail']); ?>" />
					
				</div>
				
				<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="loginpassword" value="<?php echo addslashes($_POST['loginpassword']); ?>" />  <!-- PHP gets password typed in in case the user makes an error, addslashes adds slashes in front of any characters that might cause problems, so they don't -->
					
				</div>
					<input type="submit" value="Log In" class="btn btn-success" name="submit" />
				
				
			</form>
			
		</div> <!-- /.navbar-collapse -->
		
	</div><!-- /.container-fluid -->
	
</nav>
  
  
  <div class="container-fluid">
  
   <div class="row">
	
	<div class="col-md-8 col-md-offset-2 top">
		
	<h1 class="center">Secret Diary</h1>
	
	<p class="lead center">Let out all your secrets and take them wherever you go. We promise not to tell anyone! </p>
	
	<?php
		
	if ($error) {
		
		echo '<div class="alert alert-danger center">'.addslashes($error).'</div>';
		
	}
	
	if ($message) {
		
		echo '<div class="alert alert-success center">'.addslashes($message).'</div>';
		
	}
		
	?>
	
	
	<p class="center bold">Interested? Sign up below.</p>
	
	
	<form role="form" method="post" class="form-top">
		
		<div class="form-group">
		
		<label for="email">Email:</label>
		
		<input type="email" class="form-control" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>" />
		
		</div>
		
		<div class="form-group">
		
		<label for="password">Password:</label>
		
		<input type="password" class="form-control" name="password" value="<?php echo addslashes($_POST['password']); ?>" />  <!-- PHP gets password typed in in case the user makes an error, addslashes adds slashes in front of any characters that might cause problems, so they don't -->
		
		</div>
		
		<input type="submit" class="btn btn-success" name="submit" value="Sign Up" />
	
	</form>
	
	</div>
  
  </div>
  

 
 </div><!-- /.container -->
    
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
