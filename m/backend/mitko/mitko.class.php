<?php
    include ("../database.class.php")
?>

<?php
    class Mitko {
        private $id;
        private $surname;
        private $dob;
        private $meetingPlace;
        private $age;
        private $hobbies;
        private $car;
        private $height;
        private $favSport;
        private $hasSeenParentsFirst;
        private $isAllCorrect;

        public function __construct() {}

        function postMitko($mitko){
            $sql = 'INSERT INTO wedding.mitko (surname, dob, meetingPlace, age, hobbies, car, height, favSport, hasSeenParentsFirst, isAllCorrect) 
                    VALUES 
                    (
                        :surname,
                        :dob,
                        :meetingPlace,
                        :age,
                        :hobbies,
                        :car,
                        :height,
                        :favSport,
                        :hasSeenParentsFirst,
                        :isAllCorrect
                    )';
            
            $stmt = DbConnection::getDatabaseConnection()->prepare($sql);
            $stmt->bindParam(':surname', $this->surname, PDO::PARAM_STR);
            $stmt->bindParam(':dob', $this->dob, PDO::PARAM_STR);
            $stmt->bindParam(':meetingPlace', $this->meetingPlace, PDO::PARAM_STR);
            $stmt->bindParam(':age', $this->age, PDO::PARAM_INT);
            $stmt->bindParam(':hobbies', $this->hobbies, PDO::PARAM_STR);
            $stmt->bindParam(':car', $this->car, PDO::PARAM_STR);
            $stmt->bindParam(':height', $this->height, PDO::PARAM_INT);
            $stmt->bindParam(':favSport', $this->favSport, PDO::PARAM_STR);
            $stmt->bindParam(':hasSeenParentsFirst', $this->hasSeenParentsFirst, PDO::PARAM_BOOL);
            $stmt->bindParam(':isAllCorrect', $this->isAllCorrect, PDO::PARAM_BOOL);
            
            $this->surname = $mitko->surname;
            $this->dob = $mitko->dob;
            $this->meetingPlace = $mitko->meetingPlace;
            $this->age = $mitko->age;
            $this->hobbies = json_encode($mitko->hobbies);
            $this->car = $mitko->car;
            $this->height = $mitko->height;
            $this->favSport = $mitko->favSport;
            $this->hasSeenParentsFirst = $mitko->hasSeenParentsFirst;
            $this->isAllCorrect = $mitko->isAllCorrect;

            $stmt->execute();

            return $this->getPostedRecord();
    
            if($stmt->num_rows() > 0)
            {
                return $arr_json = array('status' => 200);
            }else{
                return $arr_json = array('status' => 400);
            }
        }

        function getCorrectMitko(){
            $sql = 'SELECT * FROM wedding.mitko WHERE id = 1';
            
            $result = DbConnection::getDatabaseConnection()->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return json_encode($row);
        }

        function getPostedRecord(){
            $sql = 'SELECT * FROM wedding.mitko ORDER BY id DESC LIMIT 1';
            
            $result = DbConnection::getDatabaseConnection()->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC); 
            return json_encode($row);
        }


    }
?>