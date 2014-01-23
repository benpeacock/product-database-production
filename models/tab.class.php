<?php

class Tab extends DatabaseObject {
	
	public $id;
	public $name;

	public static function getTabs() {
		$sql = "SELECT * FROM tab";
		$dbh = Database::getPdo();
		try {
			$stmt = $dbh->query($sql);
			$result = $stmt->fetchAll();
			return $result;
		} catch (PDOException $e) {
			echo 'Unabele to get tabs ' . $e->getMessage();
		}
	}
}