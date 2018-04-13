 <?php
#connecting to database
include_once './data/config.php';

#if (isset($_POST['username']) and isset($_POST['password'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {

		#get values from the login page
		#add isset?
		$username = $_POST['user'];
		$password = $_POST['pass'];
		#encrypting password
		$password = hash('sha256', $password);

		$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";

		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		$count = mysqli_num_rows($result);
		//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
		if ($count == 1){
			$_SESSION['username'] = $username;
		}
		else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$fmsg = "Le login n'est pas valide";
			echo $fmsg;
		}
		//3.1.4 if the user is logged in Greets the user with message
		if (isset($_SESSION['username'])){
			$username = $_SESSION['username'];
			echo "Salut " . $username . "
			";
		}
		

		//Preventing mysql injection
		$username = stripcslashes($username);
		$password = stripcslashes($password);

		$username = mysqli_real_escape_string($username);
		$password = mysqli_real_escape_string($password);

	
		$link = mysql_connect('localhost', 'root', 'martinique');
		if (!$link) {
		    die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("login");

		
		$result = mysql_query("select * from users where username = '$username' and password = '$password'")
							or die("La connection a la base de donnée n'a pas été établie ".mysql_error());
		$row = mysql_fetch_array($result);
		if($row['username'] == $username && $row['password'] == $password){
			echo "Connection réussie avec succès. Bienvenue " .$row['username'];
		}
		else{
			echo "Failed to login";
		}
		

	}
 ?>
