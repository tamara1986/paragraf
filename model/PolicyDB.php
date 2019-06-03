<?php 

class PolicyDB extends DB{
	public static function addPolicy($data){
		$sql="INSERT INTO nosioci_osiguranja (id, ime_i_prezime, datum_rodjenja, broj_pasosa,telefon,email,polazak,dolazak,polisa,datum_unosa) VALUES (null,'".$data['user']['name']."','".$data['user']['birthday']."','".$data['user']['passport']."','".$data['user']['phone']."','".$data['user']['email']."','".$data['user']['dateGo']."','".$data['user']['dateBack']."',".$data['user']['action'].",now())";
		$req = self::executeSQL($sql);
		$lastInsertId=self::lastInsertId();
		
		if ($data['other'] != null) {
			foreach ($data['other'] as $key => $value) {
			$sql="INSERT INTO dodatni_osiguranici (id, ime_i_prezime, datum_rodjenja, broj_pasosa,id_nosioca) VALUES (null,'".$value['name2']."','".$value['birthday2']."','".$value['passport2']."',".$lastInsertId.")";
			$req = self::executeSQL($sql);
			}
		}
		return 'Uspešno ste dodali polisu!';

	}
	public static function getAllPolicy(){
		$sql="SELECT * FROM nosioci_osiguranja";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQLI_ASSOC);
		return $rez;
	}
	
	public static function lastInsertId(){
		$sql="SELECT id FROM nosioci_osiguranja ORDER BY id DESC limit 1";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_assoc();
		$id=intval($rez['id']);
		return $id;
	}
	public static function getSinglePolicy($id){
		$idInt=intval($id);
		$user=[];
		$sql="SELECT * FROM nosioci_osiguranja as nosilac WHERE id=".$idInt;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQLI_ASSOC);
		array_push($user,$rez);

		$sql="SELECT * FROM dodatni_osiguranici as dodatni WHERE id_nosioca=".$idInt;
		$req = self::executeSQL($sql);
		$res = $req->fetch_all(MYSQLI_ASSOC);
		array_push($user,$res);
		exit(json_encode($user));
		
		
		
	}
	public static function getSinglePolicySort($id){
		$sql="SELECT * FROM nosioci_osiguranja ORDER BY id DESC";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQLI_ASSOC);
		exit(json_encode($rez));
		// return $res;
		
	}
}