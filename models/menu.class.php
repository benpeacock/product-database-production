<?php 

class Menu extends DatabaseObject {
	
	private static function getCountries() {
		$dbh = Database::getPdo();
		try {
			$sql = "SELECT * FROM country ORDER BY name";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		} catch (PDOException $e) {
			echo 'Unable to get countries ' . $e->getMessage();
		}
	}
	
	private static function programsByCountry($country_id) {
		$dbh = Database::getPdo();
		try {
			$sql = "SELECT * FROM program WHERE country = :country_id ORDER BY name";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':country_id', $country_id, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		} catch (PDOException $e) {
			'Unable to retrieve programs by country ' . $e->getMessage();
		}
	}
	
	public static function makeMenu() {
		$dbh = Database::getPdo();
		$countries = self::getCountries();
		foreach ($countries as $country) {
			echo '<li class="dropdown">';
        	echo '<a class="dropdown-toggle" data-toggle="dropdown">' . $country['name'] . ' <b class="caret"></b></a>';
        	echo '<ul class="dropdown-menu">';
        	$programs = self::programsByCountry($country['id']);
        	foreach ($programs as $program) {
        		echo '<li><a href="?id=' . $program['id'] . '">' . $program['name'] . '</a></li>';
			}
        	echo '</ul>';
      		echo '</li>';
		}
	}
}
?>