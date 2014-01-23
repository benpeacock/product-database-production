<?php

class Year extends DatabaseObject {
	
	public $id;
	public $year;
	
	const DB_TABLE = 'year';
	
	public static function getYearList() {
		$dbh = Database::getPdo();
		try {
			$sql = "SELECT * FROM year";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		} catch (PDOException $e) {
			echo 'Could not get year list' . $e->getMessage();
		}
	}
	
	public static function getyearObject($id) {
		$dbh = Database::getPdo();
		try {
			$sql = "SELECT * FROM year WHERE id = :id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$year = new Year();
			$stmt->setFetchMode(PDO::FETCH_INTO, $year);
			$result = $stmt->fetch();
			return $result;
		} catch (PDOException $e) {
			echo 'Unable to get year object ' . $e->getMessage();
		}
	}
}