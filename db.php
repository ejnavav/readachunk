<?php

class db {
	static function load($file="db.json"){
		return json_decode(file_get_contents($file), true);
	}
	static function save($object, $file="db.json"){
		return file_put_contents($file, json_format(json_encode($object)));
	}
}

?>