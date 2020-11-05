<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Development environment of the HRW Embedded Systems course">
    <meta name="author" content="Florian Paproth">
    
    <title>Embedded Systems dev pad</title>  
    
    <!-- CodeMirror -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.17.0/codemirror.css" />
  
    <!-- Firepad -->
    <link rel="stylesheet" href="https://firepad.io/releases/v1.5.10/firepad.css" />

    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
    <!-- Custom styles for this template -->
    <link type="text/css" href="/css/custom.css" rel="stylesheet">  
    
    <link type="text/css" href="/css/all.min.css" rel="stylesheet">     
    
  </head>
  <body>  
  	<header class="">
	  	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	        <div class="navbar-header">
	          <a class="navbar-brand" href="index.php">ES Collab-Tool</a>
	        </div>
	        <?php if(is_checked_in()): ?>
	        <ul class="nav justify-content-end">
		        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Thats your group ;-)">
		        	<button class="btn btn-light"><?php echo $_SESSION['username']; ?></span> </li>
	            <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Logout from collab tool"><a class="nav-link" href="logout.php">Logout</a></li>
	        </ul>   
	        <?php endif; ?>
	    </nav><!--/.navbar-collapse -->
  </header>