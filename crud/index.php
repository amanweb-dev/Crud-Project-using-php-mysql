<?php 
include 'inc/header.php';
include 'db.php';
 ?>


<?php 
$dbase = new database();
$query = "select * from tbl_user";
$read = $dbase->readData($query);

 ?>

<?php 

if (isset($_GET['msg'])) {

	echo "<span style='color:green'>".$_GET['msg']."</span>"; 
}
if (isset($_GET['delte_id'])) {
	$delte_id=$_GET['delte_id'];

	$query = "delete from tbl_user where id = $delte_id ";
	 $dbase->delete($query);
}

 ?>
		
	<table class="tblone">
		<tr>
			<th width="20%">Name</th>
			<th width="20%">Email</th>
			<th width="20%">Skill</th>
			<th width="20%">Age</th>
			<th width="10%">Edit</th>
			<th width="10%">Delete</th>
		</tr>

		<?php if($read) {
			while ($row= $read->fetch_assoc()) {  ?>
		
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['skill']; ?></td>
			<td><?php echo $row['age']; ?></td>
			
			<td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
			<td><a href="index.php?delte_id=<?php echo urlencode($row['id']); ?>">delete</a></td>
		</tr>

		<?php } }else{
			echo "<p>data is not available</p>";
		} ?>

	</table>

	<a href="create.php">Create</a>	
		









		

<?php include 'inc/footer.php'; ?>