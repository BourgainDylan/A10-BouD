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


            //insert into
        }

    
        public function update(string $learner){
            //update (modifier dans le bdd)
        }


        public function delete(Learner $learner){
            //delete (supprimer ne ligne)
        }


        /*
        * permet d'aafficher la liste des apprenant de moins de 25 ans
        *
        * @return array listr de apprenants
        */
        public function listOfYounglearners(){


            //retourne la liste des moins de 25
        }
 
 
       
};