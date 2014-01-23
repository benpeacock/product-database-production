<?php

class Answer {
	
	public $id;
	public $country;
	public $program;
	public $year;
	public $question;
	public $answer;
	
	public static function getAnswer($program, $year, $question) {
		$dbh = Database::getPdo();
		try {
			$sql = "SELECT id, answer FROM answer WHERE program = :program AND year = :year AND question = :question LIMIT 1";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':program', $program, PDO::PARAM_INT);
			$stmt->bindParam(':year', $year, PDO::PARAM_INT);
			$stmt->bindParam(':question', $question, PDO::PARAM_INT);
			$stmt->execute();
			$answer = new Answer();
			$stmt->setFetchMode(PDO::FETCH_INTO, $answer);
			$result = $stmt->Fetch();
			return $result;
		} catch (PDOException $e) {
			echo 'Unable to get items ' . $e->getMessage();
		}
	}
	
	private static function checkAnswer($program, $year, $question) {
		$dbh = Database::getPdo();
		try {
			$sql = "SELECT id, answer FROM answer WHERE program = :program AND year = :year AND question = :question LIMIT 1";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':program', $program, PDO::PARAM_INT);
			$stmt->bindParam(':year', $year, PDO::PARAM_INT);
			$stmt->bindParam(':question', $question, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
			$check = $stmt->Fetch();
			return $check;
		} catch (PDOException $e) {
			echo 'Unable to get items ' . $e->getMessage();
		}
	}
	
	private static function insertAnswer($program, $year, $question, $answer) {
		$dbh = Database::getPdo();
		try {
			$sql = "INSERT INTO answer (program, year, question, answer) VALUES ";
			$sql .= "(:program, :year, :question, :answer)";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':program', $program, PDO::PARAM_INT);
			$stmt->bindParam(':year', $year, PDO::PARAM_INT);
			$stmt->bindParam(':question', $question, PDO::PARAM_INT);
			$stmt->bindParam(':answer', $answer);
			$stmt->execute();
			$result = $stmt->rowCount();
			return $result;
		} catch (PDOException $e) {
			echo 'Unable to insert answer ' . $e->getMessage();
		}
	}
	
	private static function updateAnswer($answer, $check) {
		$dbh = Database::getPdo();
		try {
			$sql = "UPDATE answer SET answer = :answer WHERE id = :check";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':answer', $answer);
			$stmt->bindParam(':check', $check);
			$stmt->execute();
			$result = $stmt->rowCount();
			return $result;
		} catch (PDOException $e) {
			echo 'Unable to update answer ' . $e->getMessage();
		}
	}
	
	public static function saveAnswer($program, $year, $question, $answer) {
		$dbh = Database::getPdo();
		$check = self::checkAnswer($program, $year, $question);
		if (!empty($check)) {
			$result = self::updateAnswer($answer, $check);
			return 'updated';
		} elseif (empty($check)) {
			$result = self::insertAnswer($program, $year, $question, $answer);
			return 'inserted';
		}
	}
} // end Answer class


