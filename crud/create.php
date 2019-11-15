<?php 
include 'inc/header.php';
include 'db.php';
 ?>


<?php 
$dbase = new database();

if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($dbase->link,$_POST['name']);
	$email = mysqli_real_escape_string($dbase->link,$_POST['email']);
	$skill = mysqli_real_escape_string($dbase->link,$_POST['skill']);
	$age = mysqli_real_escape_string($dbase->link,$_POST['age']);
	if (empty($name) || empty($email) || empty($skill) || empty($age)) {

		$error = "field must not be empty";
		
	}else{
		$query = "Insert into tbl_user(name,email,skill,age) values('$name','$email','$skill','$age') ";
		$create = $dbase->insert($query);
	}
}



 ?>
<?php 
if (isset($error)) {

	echo "<span style='color:red'>".$error."</span>"; 
}


 ?>

		
	<form action="create.php" method="post">
		<table class="">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" placeholder="Adwity Chakraborty"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" placeholder="adwity@gmail.com"></td>
			</tr>
			<tr>
				<td>Skill</td>
				<td><input type="text" name="skill" placeholder="Java"></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><input type="text" name="age" placeholder="18"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
					<input type="reset"value="Cancel">
				</td>
			</tr>

		</table>
	</form>	
	<a href="index.php">Go Home page</a>	









		

<?php include 'inc/footer.php'; ?>