<?php 
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
$error_msg = "";
if(isset($_POST['username']) && isset($_POST['passwort'])) {
	$username = $_POST['username'];
	$passwort = $_POST['passwort'];

	$statement = $pdo->prepare("SELECT * FROM users WHERE login = :login");
	$result = $statement->execute(array('login' => $username));
	$user = $statement->fetch();

	//Überprüfung des Passworts
	if ($user !== false && $passwort == $user['passwort']) {
		$_SESSION['userid'] = $user['id'];

		$identifier = random_string();
		$securitytoken = random_string();
			
		$insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
		$insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
		setcookie("identifier",$identifier,time()+(3600*24*365)); //Valid for 1 year
		setcookie("securitytoken",$securitytoken,time()+(3600*24*365)); //Valid for 1 year
		setcookie("firegroupid",md5($passwort . $username),time()+(3600*24*365)); //Valid for 1 year
		setcookie("mqttUser",$username,time()+(3600*24*365)); //Valid for 1 year
		setcookie("mqttPwd",$passwort,time()+(3600*24*365)); //Valid for 1 year

		header("location: index.php");
		exit;
	} else {
		$error_msg =  "Gruppenname oder Passwort war ungültig<br><br>";
	}
}

$username_value = "";
if(isset($_POST['username']))
	$username_value = htmlentities($_POST['username']); 

include("templates/header.inc.php");
?>
 <div class="container small-container-330 form-signin">
  <form action="login.php" method="post">
	<h2 class="form-signin-heading">Login</h2>
	
<?php 
if(isset($error_msg) && !empty($error_msg)) {
	echo $error_msg;
}
?>
	<label for="inputUsername" class="sr-only">Gruppenname</label>
	<input type="text" name="username" id="inputUsername" class="form-control" placeholder="Gruppenname" value="<?php echo $username_value; ?>" required autofocus>
	<label for="inputPassword" class="sr-only">Passwort</label>
	<input type="password" name="passwort" id="inputPassword" class="form-control" placeholder="Passwort" required>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button
  </form>

</div> <!-- /container -->

<?php 
include("templates/footer.inc.php")
?>