<?php

class Learner{

        //attributes (attribut)
        
        private $_firstName;
        private $_lastName;
        private $_age;
        private $_size;
        private $_status;

        const APPRENANT ='apprenant';
        const FORMATEUR ='formateur';


        // constructor (constructeur)

      
        
        
              
        // public function __construct()
        // {
        //     $this->setFirstName('prénom');
        //     $this->setLastName('name');
        //     $this->setAge('18');
        //     $this->setSize('1,87m');
        //     $this->setStatus('apprenant');

        //  }

        // public function __construct1($param1, $param2, $param3, $param4 , $param5)
        // {


        //      $this->setFirstName($param1);
        //      $this->setLastName($param2);
        //      $this->setAge($param3);
        //      $this->setSize($param4);
        //      $this->setStatus($param5);

        //  }




        //getters (accesseurs)

        public function getFirstName(){

            return $this->_firstName;

        }

        public function getLastName(){

            return $this->_lastName;
        }

        public function getAge(){
            return $this->_age;
        }

        public function getSize(){
            return $this->_size;
        }

        public function getStatus(){
            return $this->_status;
        }


        //setters (mutateurs)

        public function setFirstName(string $firstname){

            if(is_string($firstname))
            $this->_firstName = $firstname;

        }


        public function setLastName(string $Lastname){

            $this->_lastName = $Lastname;
        }

        public function setAge(string $age){

            $this->_age = $age;
        }

        public function setSize(string $size){

            $this->_size = $size;
        }

        public function setStatus(string $status){
            $this->_status = $status;

        }

        // methods (méthodes)

        public function describe(){

            $firstName = ucfirst($this->_firstName);
            $lastName = strtolower($this->_lastName);
            $number = $this->_size;
            
            echo'<div>';
            echo'<h2>Concaténation</h2>';
            echo'</br>';
            echo'<p> ===> construction d\'une phrase avec le contenu du tableau</p>';
            echo'</br> </br> ';
            echo ' <h3> '.$firstName.' '.$lastName.' </h3>';
            echo' </br> ';
            echo' '.$this->_age.' ans, je mesure ' .$number.'m et je fais partie de la formation simplon';
            echo'</br>';
            echo' '.$this->_status.'';
            echo'</br> </br> ';
            echo'</div>';
        }


            public function hydrate($tab){


                    if(isset($tab['firstname']) && !empty($tab['firstname']))
                    $this->setFirstName($tab['firstname']);

                    if(isset($tab['lastname']) && !empty($tab['lastname']))
                    $this->setLastName($tab['lastname']);

                    if(isset($tab['age']) && !empty($tab['age']))
                    $this->setAge($tab['age']);

                    if(isset($tab['size']) && !empty($tab['size']))
                    $this->setSize($tab['size']);

                    if(isset($tab['status']) && !empty($tab['status']))
                    $this->setStatus($tab['status']);
 
                
            }





    
 
}