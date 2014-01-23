<?php

class Program extends DatabaseObject {
	
	public $id;
	public $name;
	public $country;
	
	public static function getProgramObject($id) {
		$dbh = Database::getPdo();
		try {
			$sql = "SELECT * FROM program WHERE id = :id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$program = new Program();
			$stmt->setFetchMode(PDO::FETCH_INTO, $program);
			$result = $stmt->fetch();
			return $result;
		} catch (PDOException $e) {
			echo 'Could not get object ' . $e->getMessage();
		}
	}
	
}