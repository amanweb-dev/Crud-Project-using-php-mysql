<?php 
include 'inc/header.php';
include 'db.php';
 ?>


<?php 
$id = $_GET['id'];
$dbase = new database();
$query = "select * from tbl_user where id = $id";
$readId = $dbase->readData($query)->fetch_assoc();

if (isset($_POST['update'])) {
	$name = mysqli_real_escape_string($dbase->link,$_POST['name']);
	$email = mysqli_real_escape_string($dbase->link,$_POST['email']);
	$skill = mysqli_real_escape_string($dbase->link,$_POST['skill']);
	$age = mysqli_real_escape_string($dbase->link,$_POST['age']);
	// $ids = mysqli_real_escape_string($dbase->link,$_POST['id']);
	if (empty($name) || empty($email) || empty($skill) || empty($age)) {

		$error = "field must not be empty";
		
	}else{
		$query = "update  tbl_user set name='$name',email='$email',skill='$skill',age=$age where id = $id" ;
		$update_query = $dbase->update($query);
	}
}



 ?>
<?php 
if (isset($error)) {

	echo "<span style='color:red'>".$error."</span>"; 
}


 ?>

		
	<form action="update.php?id=<?php echo $id;?>" method="post">
		<table class="">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value=" <?php echo $readId['name'] ?> "></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value=" <?php echo $readId['email'] ?> "></td>
			</tr>
			<tr>
				<td>Skill</td>
				<td><input type="text" name="skill" value=" <?php echo $readId['skill'] ?> "></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><input type="text" name="age" value=" <?php echo $readId['age'] ?> "></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="update" value="Submit">
					<input type="reset"value="Cancel">
				</td>
			</tr>

		</table>
	</form>	
	<a href="index.php">Go Home page</a>	









		

<?php include 'inc/footer.php'; ?>