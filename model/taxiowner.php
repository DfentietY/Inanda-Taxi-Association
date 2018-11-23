<?php 
    Class TaxiOwner {
        public $name;
        public $surname;
        public $street;
        public $suburb;
        public $province;

        function __construct($nme, $snme, $str, $sub, $prov) {
            $this->name = $nme;
            $this->surname = $snme;
            $this->street = $str;
            $this->suburb = $sub;
            $this->province = $prov;
        }

        public static function addOwner($name, $surname, $username, $password, $street, $suburb, $prov) {
            try {
                $sql = "INSERT INTO tbl_taxiowner (own_name, own_surname, own_username, own_password, own_street, own_suburb, own_province)
                        VALUES (':name', ':surname', ':username', ':password', ':street', ':suburb', ':province')";
                $db = Db::getInstance();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':surname', $surname);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':street', $street);
                $stmt->bindParam(':suburb', $suburb);
                $stmt->bindParam(':province', $prov);
            } catch (PDOException $e) {
                //Throw Exception
            }
        }
    }
?>