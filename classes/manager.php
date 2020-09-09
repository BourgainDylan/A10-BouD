<?php



        class Manager {

        //attributes (attribut)


        private $_db;

        // constructor (constructeur)

        public function __construct($bdd){
            $this->setDb($bdd);
        }

        //getters (accesseurs)

        //setters (mutateurs)
        public function setDb($bdd){

            $this->_db = $bdd;
        }

    // methods (méthodes)
    
        public function select($firstname){
            $sql =$this->_db->prepare("SELECT * FROM learner WHERE firstname =:param1");
            $sql->bindValue(':param1', $firstname, PDO::PARAM_STR);

            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);

            //construire un objet learner

            $learner = new Learner();
            $learner->hydrate($fetch);

            return $learner;
        }


        public function create(Learner $learner){

            $sql =$this->_db->prepare("INSERT INTO `learner` (`firstname`, `lastname`, `age`, `size`, `situation`) VALUES (:param1, :param2, :param3, :param4, :param5)");
            $sql->bindvalue(':param1', $learner->getFirstName());
            $sql->bindvalue(':param2', $learner->getLastName());
            $sql->bindvalue(':param3', $learner->getAge());
            $sql->bindvalue(':param4', $learner->getSize());
            $sql->bindvalue(':param5', $learner->getStatus());
            $sql->execute();
        }

    
        public function update(learner $learnerUpdate){

     
            $sql = $this->_db->prepare("UPDATE `learner`
             SET `firstname` = :param1,
            `lastname` = :param2, 
            `age`= :param3,
            `size` = :param4,
            `situation`= :param5
            
            WHERE id =:param6");
            
            $sql->bindvalue(':param1', $learnerUpdate->getFirstName());
            $sql->bindvalue(':param2', $learnerUpdate->getLastName());
            $sql->bindvalue(':param3',  $learnerUpdate->getAge());
            $sql->bindvalue(':param4', $learnerUpdate->getSize());
            $sql->bindvalue(':param5', $learnerUpdate->getStatus());
            $sql->bindvalue(':param6', $learnerUpdate->getId());
         
            $sql->execute();

            
        }


        public function delete(Learner $learner){

            $sql =$this->_db->prepare("DELETE FROM learner WHERE learner.firstname =:param1");
            $sql->bindvalue(':param1', $learner->getFirstName());
            $sql->execute();
        }



        public function listOfYounglearners(int $age=18){

            $sql =$this->_db->prepare("SELECT * FROM learner WHERE age >= '$age'");
           
            $sql->execute();

            $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $fetch;
     
        }


        public function createTable(){


            $sql =$this->_db->prepare("CREATE TABLE `learner` ( `id` int(11) NOT NULL AUTO_INCREMENT,
            `firstname` varchar(255) NOT NULL,
            `lastname` varchar(80) NOT NULL,
            `age` tinyint(80) NOT NULL,
            `size` float NOT NULL,
            `situation` varchar(255) NOT NULL,
            PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8");

            $sql->execute();

        }
        public function deleteTable(){

          $sql = $this->_db->prepare("DROP TABLE learner");
          $sql->execute();

        }

      
        public function ReadTable(){
    
            $sql = $this->_db->prepare("SELECT * FROM learner");
            $sql->execute();
            $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
            
        
            foreach($fetch as $value){

                echo''.$value['firstname'].' '.$value['lastname'].' '.$value['age'].' '.$value['size'].' '.$value['situation'].'';
                echo'</br>';
         

            }

      
        }

        
        public function ReadOne(){
            
            $sql = $this->_db->prepare("SELECT * FROM learner WHERE learner.firstname = 'hugo'");
            $sql->execute();
            $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $fetch;
          

        }




        public function TruncateTable(){

            $sql = $this->_db->prepare("TRUNCATE `learner`.`learner`");
            $sql->execute();


        }

 
       
};