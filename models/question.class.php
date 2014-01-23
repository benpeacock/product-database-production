<?php
class Question extends DatabaseObject {
	public $id;
	public $question;
	public $answer;
	
	public function getQuestions($tab_id) {
		$dbh = Database::getPdo();
		try {
			$sql = "SELECT * FROM question WHERE tab = :tab_id ORDER BY count";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':tab_id', $tab_id, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		} catch (PDOException $e) {
			echo 'Unable to get questions ' . $e->getMessage();
		}
	}
}