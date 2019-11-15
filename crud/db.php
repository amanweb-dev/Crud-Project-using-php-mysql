<?php include "config.php"; ?>
<?php 
class database{
public $host = DB_HOST;
public $user = DB_USER;
public $pass = DB_PASS;
public $dname = DB_NAME;

public $link;
public $error;

public function __construct(){
	$this->connectDB();
}

private function connectDB(){
$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dname);

if(!$this->link){


	$this->error = "connection error".$this->link->connect_error;
	return false;
}


}

// read data
public function readData($query){

$result = $this->link->query($query) or die($this->link->error.__LINE__);
if ($result->num_rows >0) {
	return $result;
}else{
	return false;
}

}

public function insert($query){
$result = $this->link->query($query) or die($this->link->error.__LINE__);
if ($result) {
	header("Location: index.php?msg=".urlencode('data inserted successfully.'));
	exit();
}else{
	die("error: ");
}

}


public function update($query){
$result = $this->link->query($query) or die($this->link->error.__LINE__);
if ($result) {
	header("Location: index.php?msg=".urlencode('data updated successfully.'));
	exit();
}else{
	die("error: ");
}

}


public function delete($query){
$result = $this->link->query($query) or die($this->link->error.__LINE__);
if ($result) {
	header("Location: index.php?msg=".urlencode('data deleted successfully.'));
	exit();
}else{
	die("error: ");
}

}


	
}



 ?>