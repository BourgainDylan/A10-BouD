
<?php
require_once'./classes/manager.php';
require_once'./classes/Learner.php';
require_once'./settings/db.php';
?>



<!DOCTYPE html>
<html  lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>PHP - POO</title>
</head>
<body>

<div>
<a href='index.php?button=1'><button>CREATE TABLE</button></a>
<a href='index.php?button=2'><button>DELETE TABLE</button></a>
<a href='index.php?button=3'><button>READ TABLE</button></a>
<a href='index.php?button=4'><button>TRUNCATE TABLE</button></a>
</br>
</br>
<a href='index.php?button=5'><button>Read one</button></a>
<a href='index.php?button=6'><button>Add learner</button></a>
<a href='index.php?button=7'><button>supp learner</button></a>
<a href='index.php?button=8'><button>update learner</button></a>
<a href='index.php?button=9'><button>Read>25</button></a>

<?php


if(isset($_GET['button'])){

    $button= $_GET['button'];

  echo'  <div>';
    switch($button){
        case 1: 
        $manager = new Manager($db);
           $createTable = $manager->createTable();
           echo' <h2> votre table a été crée  ! </h2>';
        break;
        
        case 2:
            $manager = new Manager($db);
            $deleteTable = $manager->deleteTable();
            echo'<h2>  votre table a été supprimée !</h2> ';
        break;

        case 3:
            $manager = new Manager($db);
            $ReadTable = $manager->ReadTable();
        break;

       
        case 4:
            $manager = new Manager($db);
            $truncateeTable = $manager->TruncateTable();
        break;
    

        case 5:
            $manager = new Manager($db);
            $readOne = $manager->readOne();
            var_dump($readOne);
         
        break;


        case 6:

            $Learners = [

            ['firstname'=>'hugo', 'lastname'=>'flahaut', 'age'=>21,'size'=>1.91,'situation'=>'apprenant'],
            ['firstname'=>'dylan', 'lastname'=>'bourgain', 'age'=>24,'size'=>1.75,'situation'=>'apprenant'],
            ['firstname'=>'guillaume', 'lastname'=>'chausse', 'age'=>38,'size'=>1.80,'situation'=>'apprenant'],
            ['firstname'=>'corentin', 'lastname'=>'chopin', 'age'=>19,'size'=>1.81,'situation'=>'apprenant'],
            ['firstname'=>'maxence', 'lastname'=>'denquin', 'age'=>19,'size'=>1.80,'situation'=>'apprenant'],
            ['firstname'=>'giles', 'lastname'=>'fauquembergues', 'age'=>26,'size'=>1.81,'situation'=>'apprenant'],
            ['firstname'=>'claudine', 'lastname'=>'fontaine', 'age'=>60,'size'=>1.60,'situation'=>'apprenant'],
            ['firstname'=>'thomas', 'lastname'=>'garenaux', 'age'=>21,'size'=>1.70,'situation'=>'apprenant'],
            ['firstname'=>'leonie', 'lastname'=>'lemaitre', 'age'=>26,'size'=>1.70,'situation'=>'apprenant'],
            ['firstname'=>'tony', 'lastname'=>'mahier', 'age'=>21,'size'=>1.70,'situation'=>'apprenant'],
            ['firstname'=>'raphael', 'lastname'=>'mahiard', 'age'=>28,'size'=>1.82,'situation'=>'apprenant'],

            ];


            foreach($Learners as $lines){

                $manager = new Manager($db);

                $newlearnerObjet = new learner();

                $newlearnerObjet->hydrate($lines);
                $manager->create($newlearnerObjet);
                

            }


            echo'nouveau apprenant ajouté !';
           
        break;

        
        case 7:

            $manager = new Manager($db);
            $delete = $manager->select("hugo");
            $manager->delete($delete); 

            echo'apprenant supprimé !';
            
        break;

        case 8:


            $manager = new Manager($db);
            $objetToUpdate = $manager->select("hugo");
            $ageToUpdate =  $objetToUpdate->getAge();
            $ageToUpdate = $ageToUpdate + 1;

            $learnerUpdateTab =[

            
                'firstname'=>"hugo",
                'lastname'=>'flahaut',
                'age'=>$ageToUpdate,
                'size'=>1.91,
                'situation'=>'apprenant',
                'id'=>$objetToUpdate->getId()

            ];

        $manager = new Manager($db);
        $updateObjet = new learner();
        $updateObjet->hydrate($learnerUpdateTab);

        $manager->update($updateObjet);

  
        $objetToUpdate = $manager->select("hugo");
        $updateObjet->describe();

        break;
        

        case 9:
        $manager = new Manager($db);
        $list = $manager->listOfYounglearners(25);
        echo'</br>';
        echo' <h2>apprenant de + de 25 ans </h2>';
        echo'</br>';
        foreach($list as $value){
           
            echo' '.$value['firstname'].' '.$value['lastname'].' '.$value['age'].' '.$value['size'].' '.$value['situation'].'';
            echo'</br>';
        }

        break;
    

        echo'  </div>';
    
    
    }

  echo' </div>';

  

};


?>
    
</body>
</html>