<?php

// include_once '../Database/DB.php';
// include_once '../models/User.php';

class UserController //UtilisateurController
{

    public function addUser() //ajouterUtil
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $data = json_decode(file_get_contents("php://input"));
        $user = new User();
        $ref = $this->nbru($data->lastname); // add random number to 
        $user->setReference($ref);
        $user->setFirstName($data->firstname);
        $user->setLastName($data->lastname);
        $user->setAge($data->age);
        $tab = array("reference" => $ref,   "firstname" => $data->firstname, "lastname" => $data->lastname, "age" => $data->age);
        $user->addUser($tab);
        echo json_encode($tab);
    }


    public function nbru($lastname)  // generate random number
    {
        $user = new User();
        $nb = $user->count();
        $ran = rand();
        return $lastname . $nb['nb'] . $ran;
    }

    public function Signin($ref)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: GET');
        $user = new User();
        $user->setReference($ref);
        $u = $user->Signin($ref);
        echo json_encode($u);
    }
}

       

// $database = new DB();
// $db = $database->connect();

// $User = new User($db);
// $data = json_decode(file_get_contents("php://input"));
// // print_r($data);
// // return;

//     $res = false;
//     $User->reference = $User->generateRandomString();
//     $User->firstname = $data->firstname;
//     $User->lastname = $data->lastname;
//     $User->age = $data->age; { {
//             if ($User->Signup()) {
//                 echo json_encode(
//                     array('message' => 'Account Created Succesufully !!!', 'reference' => $User->reference, 'res' => true)
//                 );
//         } else {
//             echo json_encode(
//                 array('message' => 'Try Again !!', 'res' => false)
//             );
//         }
//     }
