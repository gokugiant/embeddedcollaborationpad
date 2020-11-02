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
    <link href="css/cover.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    
  </head>
  <body class="text-center">
	<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
	  	<nav class="navbar navbar-inverse navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Menu</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-leaf logo"></i>ES Collab-Tool</a>
	        </div>
	        <?php if(!is_checked_in()): ?>
	        <div id="navbar" class="navbar-collapse collapse">
	          <form class="navbar-form navbar-right" action="login.php" method="post">
				<table class="login" role="presentation">
					<tbody>
						<tr>
							<td>							
								<div class="input-group">
									<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
									<input class="form-control" placeholder="E-Mail" name="email" type="email" required>								
								</div>
							</td>
							<td><input class="form-control" placeholder="Passwort" name="passwort" type="password" value="" required></td>
							<td><button type="submit" class="btn btn-success">Login</button></td>
						</tr>
						<tr>
							<td><label style="margin-bottom: 0px; font-weight: normal;"><input type="checkbox" name="angemeldet_bleiben" value="remember-me" title="Angemeldet bleiben"  checked="checked" style="margin: 0; vertical-align: middle;" /> <small>Angemeldet bleiben</small></label></td>
							<td><small><a href="passwortvergessen.php">Passwort vergessen</a></small></td>
							<td></td>
						</tr>					
					</tbody>
				</table>		
	          
	            
	          </form>         
	        </div><!--/.navbar-collapse -->
	        <?php else: ?>
	        <div id="navbar" class="navbar-collapse collapse">
	         <ul class="nav navbar-nav navbar-right">     
	         	<li><a href="internal.php">Interner Bereich</a></li>       
	            <li><a href="settings.php">Einstellungen</a></li>
	            <li><a href="logout.php">Logout</a></li>
	          </ul>   
	        </div><!--/.navbar-collapse -->
	        <?php endif; ?>
	      </div>
	    </nav>