
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

<?php

// from db



$manager = new Manager($db);



$learner1 = $manager->select('Dylan');
$learner2 = $manager->select('guillaume');
$learner3 = $manager->select('');


$oneLearner = [
    'firstname'=>'corentin',
    'lastname'=>'chopin',
    'age'=>19,
    'size'=>1.81,
    'situation'=>'apprenant'

];

$learner4 = new learner();
$learner4->hydrate($oneLearner);
$manager->create($learner4); //insert bdd

 

$learner1->describe();
$learner2->describe();
$learner3->describe();
$learner4->describe();

$list = $manager->listOfYounglearners();

$learner3->setStatus(learner::APPRENANT);


// $Learner1 = new Learner();
// $Learner2 = new Learner();



// $tab1=[  'firstname'=>'Dylan',
//           'lastname'=>'Bourgain',
//          'situation'=>'apprenant'
//     ];

//     $tab2=[     'firstname'=>'iron',
//                 'lastname'=>'man',
//                 'situation'=>'trop fort'
//          ];

// $Learner1 ->   hydrate($tab1);
// $Learner2 -> hydrate($tab2);

// $Learner1 -> describe();
// $Learner2 -> describe();


    // $tab=[
    //     'firstname'=>'Dylan',
    //     'lastname'=>'Bourgain',
    //     'age'=>'24',
    //     'size' =>'1.81',
    //     'status'=>'apprenant'
    // ];


    // $Learner->hydrate($tab);
    // $Learner->describe();
  

    // $tab= [

    //     'age' => '39',
    //     'size' =>'1,56',
    
    // ];

    // $Learner->hydrate($tab);
    // $Learner->describe();

    
    // $Learner->setFirstName('dylan');
    // $Learner->setLastName('Bourgain');
    // $Learner->setAge(24);
    // $Learner->setSize(1.75);
    // $Learner->setStatus('Apprenant');



    // $prenom =$Learner->getFirstName();
    // $nom = $Learner->getLastName();
    // $age = $Learner->getAge();
    // $size = $Learner->getSize();
    // $status = $Learner->getStatus();



    

?>
    
</body>
</html>