<?php 
    Class Taxi {

        public $id;
        public $reg_num;
        public $gross_mass;
        public $engine_num;
        public $chasis_num;
        public $manufacturer;
        public $passenger_num;
        public $descript;
        public $year_reg;
        public $dr_id;
        public $owner_id;

        function construct($i, $r, $g, $e, $c, $m, $p, $d, $y, $dr_i, $own_id) {
            $this->id = $i;
            $this->reg_num = $r;
            $this->gross_mass = $g;
            $this->engine_num = $e;
            $this->chasis_num = $c;
            $this->manufacturer = $m;
            $this->passenger_num = $p;
            $this->descript = $d;
            $this->year_reg = $y;
            $this->dr_id = $dr_i;
            $this->owner_id = $own_id;
        }

        function AddTaxi($id, $reg_num, $gross_mass, $engine_num, $chasis_num, $manufacturer, $passenger_num, $descript, $year_reg, $dr_i, $own_id) {
            try {
                $sql = "INSERT INTO tbl_taxi VALUES 
                        (':id', ':regNum', ':gMass', ':eNum', ':cNum', ':manu', ':pNum', ':desc', ':yReg', ':drId', ':oId')";
                $db = Db::getInstance();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':regNum', $reg_num);
                $stmt->bindParam(':gMass', $gross_mass);
                $stmt->bindParam(':eNum', $engine_num);
                $stmt->bindParam(':cNum', $chasis_num);
                $stmt->bindParam(':manu', $manufacturer);
                $stmt->bindParam(':pNum', $passenger_num);
                $stmt->bindParam(':desc', $descript);
                $stmt->bindParam(':yReg', $year_reg);
                $stmt->bindParam(':drId', $dr_i);
                $stmt->bindParam(':oId', $own_id);
                $stmt->execute();

            } catch (PDOException $e) {
                //Throw Exception
            }
        }

        function UpdateTaxi() {
            
        }

        function DeleteTaxi($id) {
            try {
                $sql = "DELETE FROM tbl_taxi WHERE txi_id = :id";
                $db = Db::getInstance();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } catch (PDOException $e) {
                //Throw Exception
            } 
        }
    }
?>