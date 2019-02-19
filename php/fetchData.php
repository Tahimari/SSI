<?php 
require_once"database.php";
try {
	$id = $_SESSION['post_id'];
	$sql = "Select * from posts where post_id ='$id'";
	if($result = $db->query($sql)) {
		return $result->fetch();
	}
} catch(Exception $e) {
}
?>