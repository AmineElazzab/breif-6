<?php

class User
{

    // private $conn;  
    // private $table = 'users';
    private  $reference;
    private  $firstname;
    private  $lastname;
    private  $age;

    // public function __construct($db)
    // {
    //     $this->conn = $db;
    // }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }


    public function count()
    {

        $qr = "SELECT count(*) as nb from users";
        $res = DB::connect()->query($qr)->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function addUser($tab)  //ajouterU
    {

        $ref = $tab['reference'];
        $first = $tab['firstname'];
        $last = $tab['lastname'];
        $age = $tab['age'];

        // $qr='INSERT INTO users (reference, firstname, lastname, age) values("'.$this->reference.'","'.$this->firstname.'","'.$this->lastname.'",'.$this->age.'")';
        $qr = "INSERT INTO `users` ( `reference`, `firstname`, `lastname`, `age`) values  ( '$ref'  ,'$first','$last','$age') ";
        // die($qr);
        $res = DB::connect()->prepare($qr);
        if ($res->execute()) {
            return 'ok';
        } else {
            return 'no';
        }
    }

    public function Signin()
    {
        $qr='SELECT * from users where reference="'.$this->reference.'"';
        $res=DB::connect()->query($qr);
       if( $row=$res->fetch(PDO::FETCH_ASSOC)){
        return $row;
        
       }
       else{
        return array("message"=>"la reference entrer est invalid");
       }
        
        //    $res->close();
           $res=null;
      
    }

}

    


// class User
// {

//     private $conn;
//     private $table = 'users';
//     public $reference;
//     public $firstname;
//     public $lastname;
//     public $age;

//     public function __construct($db)
//     {
//         $this->conn = $db;
//     })))

//     function generateRandomString($length = 5)
//     {
//         $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
//         $charactersLength = strlen($characters);
//         $Reference = 'AC-HA_';
//         for ($i = 0; $i < $length; $i++) {
//             $Reference .= $characters[rand(0, $charactersLength - 1)];
//         }
//         return $Reference;
//     }
//     public function Signup()
//     {
//         try {
//             $query  = 'INSERT INTO ' . $this->table . '(`reference`, `firstname`, `lastname`, `age`) VALUES ( :reference, :firstname, :lastname, :age);';
//             $stmt = $this->conn->prepare($query);
//             $stmt->bindParam(':reference', $this->reference);
//             $stmt->bindParam(':first_name', $this->firstname);
//             $stmt->bindParam(':last_name', $this->last_name);
//             $stmt->bindParam(':age', $this->age);
//             $stmt->execute();
//             return true;
//         } catch (Exception $e) {
//             echo 'Exception reçue : ',  $e->getMessage(), "\n";
//             return false;
//         }
//     }
// }
