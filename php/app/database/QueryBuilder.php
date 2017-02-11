<?php 

class QueryBuilder
{
	protected $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function selectAll($table)
	{
		$db = new SQLite3('../../../skloniste.db');

		$stmt = $db->query('SELECT * FROM '.$table);

		while($result = $stmt->fetchArray(SQLITE3_ASSOC)):
			$r[] = $result;
		endwhile;

		$db->close();
		
		return isset($r) ? $r : null;
	}

	public function storeProf($table, $name, $surname, $instrument, $bio, $img)
	{
		$db = new SQLite3('../../../skloniste.db');

		$name = $db->escapeString($name);
		$surname = $db->escapeString($surname);
		$instrument = $db->escapeString($instrument);
		$bio = $db->escapeString($bio);

		$query = "INSERT INTO ".$table." (name, surname, instrument, bio, img) VALUES ('$name', '$surname', '$instrument', '$bio', '$img')";

		if ($db->exec($query))
		{
			$stmt = $db->prepare('SELECT name, surname, instrument, bio, img FROM '.$table.' WHERE id=:id');	
			
			$result = $stmt->execute();

			$db->close();
			
			return $result;
		}
		else
		{
			die('Doslo je do neocekivane greske');
		}
	}

	public function show($table, $id)
	{
		$db = new SQLite3('../../../skloniste.db');

		$stmt = $db->query("SELECT * FROM '$table' WHERE id ='$id'");

		while($result = $stmt->fetchArray(SQLITE3_ASSOC)):
			$r[] = $result;
		endwhile;

		$db->close();

		return isset($r) ? $r : null;
	}
	
	public function showImagesAPI($table, $id)
	{
		$db = new SQLite3('../../skloniste.db');

		$stmt = $db->query("SELECT * FROM '$table' WHERE galleryId ='$id'");

		while($result = $stmt->fetchArray(SQLITE3_ASSOC)):
			$r[] = $result;
		endwhile;

		$db->close();

		return isset($r) ? json_encode($r) : null;
	}

	public function update($table, $arr)
	{
		$db = new SQLite3('../../../skloniste.db');
		$id = $arr['id'];

		foreach($arr as $k => $v):
			$v = $db->escapeString($v);

			$query = "UPDATE '$table' SET '$k'='$v' WHERE id='$id'";

			if ($db->exec($query))
			{
				$stmt = $db->prepare("SELECT '$k' FROM '$table' WHERE id='$id'");			
				
				$result = $stmt->execute();
				
			}
			else
			{
				die('Doslo je do neocekivane greske');
			}
		endforeach;

		$db->close();

		return $result;

	}

	public function destroy($table, $id)
	{
		$db = new SQLite3('../../../skloniste.db');

		$query = "DELETE FROM '$table' WHERE id='$id'";

		if ($db->exec($query))
		{
			$stmt = $db->prepare("SELECT * FROM '$table' WHERE id=:id");			
			
			$result = $stmt->execute();

			$db->close();
			
			return $result;
		}
		else
		{
			die('Doslo je do neocekivane greske');			
		}
	}

	public function destroyImg($table, $filename)
	{
		$db = new SQLite3('../../../skloniste.db');

		$query = "DELETE FROM '$table' WHERE filename='$filename'";

		if ($db->exec($query))
		{
			$stmt = $db->prepare("SELECT * FROM '$table' WHERE id=:id");			
			
			$result = $stmt->execute();

			$db->close();
			
			return $result;
		}
		else
		{
			die('Doslo je do neocekivane greske');			
		}
	}

	public function check($email, $password)
	{
		$db = new SQLite3('../../skloniste.db');

		$stmt = $db->query("SELECT * FROM users WHERE email='$email' AND password='$password' ;");

		$results = $stmt->fetchArray();

		return $results;
		
	}

	// Common Database Methods
	public function find_all($table, $id="")
	{
		$db = new SQLite3('../../skloniste.db');
		$stmt = $db->query('SELECT * FROM '.$table.' WHERE category_id="'.$id.'"');
		
		while($result = $stmt->fetchArray(SQLITE3_ASSOC)):
			$r[] = $result;
		arsort($r);
		endwhile;

		$db->close();
		
		return isset($r) ? $r : null;
  	}

	public function getAll($table)
	{
		$db = new SQLite3('../../skloniste.db');

		$stmt = $db->query('SELECT * FROM '.$table);

		while($result = $stmt->fetchArray(SQLITE3_ASSOC)):
			$r[] = $result;
		endwhile;
		return isset($r) ? $r : null;
	}

	public function indexGallery()
	{
		$db = new SQLite3('../../../skloniste.db');

		$stmt = $db->query('SELECT * FROM galleries');

		while($result = $stmt->fetchArray(SQLITE3_ASSOC)):
			$r[] = $result;
		endwhile;

		$db->close();
		
		return isset($r) ? $r : null;
			
	}

	public function storeGallery($title)
	{
		$db = new SQLite3('../../../skloniste.db');

		$query = "INSERT INTO galleries (title) VALUES ('$title');";

		if ($db->exec($query))
		{
			$stmt = $db->prepare('SELECT title FROM galleries WHERE id=:id');	
			
			$result = $stmt->execute();

			$db->close();
			
			return $result;
		}
		else
		{
			die('Doslo je do neocekivane greske.');			
		}
	}

	public function storeAdmin($table, $name, $surname, $email, $password)
	{
		$db = new SQLite3('../../../skloniste.db');

		$name = $db->escapeString($name);
		$surname = $db->escapeString($surname);
		$email = $db->escapeString($email);
		$password = sha1($db->escapeString($password));

		$query = "INSERT INTO ".$table." (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')";

		if ($db->exec($query))
		{
			$stmt = $db->prepare('SELECT name, surname, email, password FROM '.$table.' WHERE id=:id');	
			
			$result = $stmt->execute();

			$db->close();
			
			return $result;
		}
		else
		{
			die('Doslo je do neocekivane greske');
		}
	}

}
