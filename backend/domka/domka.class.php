<?php
    include ("../database.class.php")
?>

<?php
    class Domka {
        private $id;
        private $surname;
        private $dob;
        private $email;
        private $age;
        private $hobbies;
        private $hairColor;
        private $height;
        private $favColor;
        private $sentFirstMessage;
        private $isAllCorrect;

        public function __construct() {}

        function postDomka($domka){
            $sql = 'INSERT INTO d29120_wedding.domka (surname, dob, email, age, hobbies, hairColor, height, favColor, sentFirstMessage, isAllCorrect) 
                    VALUES 
                    (
                        :surname,
                        :dob,
                        :email,
                        :age,
                        :hobbies,
                        :hairColor,
                        :height,
                        :favColor,
                        :sentFirstMessage,
                        :isAllCorrect
                    )';
            
            $stmt = DbConnection::getDatabaseConnection()->prepare($sql); 
            
            $stmt->bindParam(':surname', $this->surname, PDO::PARAM_STR);
            $stmt->bindParam(':dob', $this->dob, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':age', $this->age, PDO::PARAM_INT);
            $stmt->bindParam(':hobbies', $this->hobbies, PDO::PARAM_STR);
            $stmt->bindParam(':hairColor', $this->hairColor, PDO::PARAM_STR);
            $stmt->bindParam(':height', $this->height, PDO::PARAM_INT);
            $stmt->bindParam(':favColor', $this->favColor, PDO::PARAM_STR);
            $stmt->bindParam(':sentFirstMessage', $this->sentFirstMessage, PDO::PARAM_BOOL);
            $stmt->bindParam(':isAllCorrect', $this->isAllCorrect, PDO::PARAM_BOOL);
            
            $this->surname = $domka->surname;
            $this->dob = $domka->dob;
            $this->email = $domka->email;
            $this->age = $domka->age;
            $this->hobbies = json_encode($domka->hobbies);
            $this->hairColor = $domka->hairColor;
            $this->height = $domka->height;
            $this->favColor = $domka->favColor;
            $this->sentFirstMessage = $domka->sentFirstMessage;
            $this->isAllCorrect = $domka->isAllCorrect;

            $stmt->execute();

            return $this->getPostedRecord();
    
            if($stmt->num_rows() > 0)
            {
                return $arr_json = array('status' => 200);
            }else{
                return $arr_json = array('status' => 400);
            }
        }

        function getCorrectDomka(){
            $sql = 'SELECT * FROM d29120_wedding.domka WHERE id = 1';
            
            $result = DbConnection::getDatabaseConnection()->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return json_encode($row);
        }

        function getPostedRecord(){
            $sql = 'SELECT * FROM d29120_wedding.domka ORDER BY id DESC LIMIT 1';
            
            $result = DbConnection::getDatabaseConnection()->query($sql); 
            $row = $result->fetch(PDO::FETCH_ASSOC); 
            return json_encode($row);
        }


    }
?>