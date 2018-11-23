<?php 
    class Driver {

        public $idnumber;
        public $surname;
        public $name;
        public $assoc_name;
        public $oper_num;
        public $street;
        public $suburb;
        public $province;

        function __construct($id, $snme, $nme, $assoc, $oper, $str, $sbrb, $prov){
            $this->idnumber = $id;
            $this->surname = $snme;
            $this->name = $name;
            $this->assoc_name = $assoc;
            $this->oper_num = $oper;
            $this->street = $str;
            $this->suburb = $sbrb;
            $this->province = $prov;
        }

        public static function AddDriver($id, $snme, $nme, $assoc, $oper, $str, $sbrb, $prov) {
            try {

                $sql = "INSERT INTO tbl_driver 
                        VALUES (':id', ':sname', ':name', ':assoc', ':opernum', ':street', ':suburb', ':province')";
                $db = Db::getInstance();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':sname', $snme);
                $stmt->bindParam(':name', $nme);
                $stmt->bindParam(':assoc', $assoc);
                $stmt->bindParam(':opernum', $oper);
                $stmt->bindParam(':street', $str);
                $stmt->bindParam(':suburb', $sbrb);
                $stmt->bindParam(':province', $prov);
                $stmt->execute();

            }catch(PDOException $e) {
                //Throw Exception
            }
        }

        public static function UpdateDriver() {

        }

        public static function DeleteDriver($id) {
            try {
                $sql = "DELETE FROM tbl_driver WHERE dr_idnumber = :id";
                $db = Db::getInstance();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } catch (PDOException $e) {
                //Throw Exception
            }
        }

        public static function getDriverInfo($id) {
            try {
                $sql = "SELECT * FROM tbl_driver WHERE dr_idnumber = :id";
                $db = Db::getInstance();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                $r = $stmt->fetch(PDO::FETCH_OBJ);

                $driver = new Driver($r->dr_idnumber, 
                                     $r->dr_surname, 
                                     $r->dr_name, 
                                     $r->dr_assoc_name, 
                                     $r->dr_oper_num, 
                                     $r->dr_street, 
                                     $r->dr_suburb, 
                                     $r->dr_province);

                return $driver;
            }catch (PDOException $e){
                //Throw Exception
            }
        }
    }
?>