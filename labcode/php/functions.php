<?php
	function insert($table, $record){
		global $pdo;
		$keys = array_keys($record);
		$keysWithColon = implode(", ", $keys);
		$keysWithCommaColon = implode(", :", $keys);
		$sql = "INSERT INTO $table($keysWithColon) VALUES(:$keysWithCommaColon)";
		// die($sql);
		$stmt = $pdo->prepare($sql);
		$stmt->execute($record);
		return true;
	}