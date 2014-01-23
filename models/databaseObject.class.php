<?php

abstract class DatabaseObject {
	
	const DB_TABLE = 'abstract'; 
	
	// Not using this for anything yet...
	public static function getObjectById($id, $type) {
		$dbh = Database::getPdo();
		$validTypes = array('user', 'program', 'country', 'question', 'answer');
		if (!in_array($type, $validTypes)) {
			exit ('Invalid data type.');
		}
		try {
			$sql = "SELECT * FROM " . self::DB_TABLE . " WHERE id = :id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam('id', $id, PDO::PARAM_INT);
			$stmt->execute();
			if ($type == 'user') {
				$user = new User();
				$stmt->setFetchMode(PDO::FETCH_INTO, $user);
			}
			if ($type == 'program') {
				$program = new Program();
				$stmt->setFetchMode(PDO::FETCH_INTO, $program);
			}
			if ($type == 'country') {
				$country = new Country();
				$stmt->setFetchMode(PDO::FETCH_INTO, $country);
			}
			if ($type == 'question') {
				$question = new Question();
				$stmt->setFetchMode(PDO::FETCH_INTO, $question);
			}
			if ($type == 'answer') {
				$answer = new Answer();
				$stmt->setFetchMode(PDO::FETCH_INTO, $answer);
			}
			$result = $stmt->fetch();
			return $result;
		} catch (PDOException $e) {
			echo 'Unable to retrieve record by id' . $e->getMessage();
		}
	}
} // end databaseObject



