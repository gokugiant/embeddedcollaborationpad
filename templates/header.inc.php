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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
    <!-- Custom styles for this template -->
    <link type="text/css" href="/css/custom.css" rel="stylesheet">
  </head>
  <body>  
  	<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
	  	<nav class="navbar navbar-inverse navbar-static-top">
	      
	        
	        
	        <?php if(!is_checked_in()): ?>
	        
	        <div class="navbar-header">
	          <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-leaf logo"></i>ES Collab-Tool </a>
	        </div>
	        <div id="navbar">
	          <form class="navbar-form navbar-right" action="login.php" method="post">
				<table class="login" role="presentation">
					<tbody>
						<tr>
							<td>							
								<div class="input-group">
									<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
									<input class="form-control" placeholder="Gruppenname" name="username" type="text" required>								
								</div>
							</td>
							<td><input class="form-control" placeholder="Passwort" name="passwort" type="password" value="" required></td>
							<td><button type="submit" class="btn btn-success">Login</button></td>
						</tr>				
					</tbody>
				</table>		
	          
	            
	          </form>         
	        </div><!--/.navbar-collapse -->
	        <?php else: ?>
	        <div class="navbar-header">
	          <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-leaf logo"></i>ES Collab-Tool</a>
	        </div>
	        <div id="navbar">
	         <ul class="nav navbar-nav navbar-right">     
	         	<li class="nav-item"><a class="nav-link" href="internal.php">Interner Bereich</a></li>       
	            <li class="nav-item"><a class="nav-link" href="settings.php">Einstellungen</a></li>
	            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
	          </ul>   
	        </div><!--/.navbar-collapse -->
	        <?php endif; ?>
	     
	    </nav>
  </header>
	
	<div class="container-fluid">