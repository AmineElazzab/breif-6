<?php

class Rdv{
    private  $id;   
    private  $date;     // date du rdv
    private  $horaire;  // horaire du rdv
    // type de consultation
    private  $typeCons; // type de consultation
    private  $reference;        // reference du patient

    public function setId($id){     
        $this->id = $id;    
    }

    public function setDate($date){     
        $this->date = $date;    
     }

     public function setTypeCons($typeCons){
        $this->typeCons = $typeCons;
     }

     public function setHoraire($horaire){
        $this->horaire = $horaire;
     }

     public function setReference($reference){
        $this->reference = $reference;
     }

     public function ajouterRdv()
    {
        $qr='INSERT into rendezvous (date,horaire,typeCons,reference) values("'.$this->date.'","'.$this->horaire.'","'.$this->typeCons.'","'.$this->reference.'")';     // requete sql
        $res=DB::connect()->prepare($qr);   // preparer la requete
        if($res->execute()){    // executer la requete
            return 'ok';    // return ok
        }
        else{   // else
            return 'no' ; // return no
        }

    }

     public function afficherRdv($ref)      
    {
        $qr='SELECT * from rendezvous where reference="'.$ref.'" order by id DESC' ;    // requete sql
        $res=DB::connect()->prepare($qr);   // preparer la requete
        $res->execute();    // executer la requete
            return $res->fetchAll(PDO::FETCH_ASSOC );   // return les données
            // $res->close();   // fermer la requete
            $res=null;  // detruire la requete
        // else{
            return 'no';    // return no
        // }
    }
    public function afficherHr($date)       
    {
        $qr='SELECT horaire from rendezvous where date="'.$date.'"' ;   // requete sql
        $res=DB::connect()->prepare($qr);   // preparer la requete
        $res->execute();    // executer la requete
            return $res->fetchAll(PDO::FETCH_COLUMN);   // return les données
            // $res->close();
            $res=null;
        // else{
            return [];
        // }
    }

     public function modifierRdv()
    {
     
        $qr="UPDATE rendezvous SET date='$this->date',horaire='$this->horaire',typeCons='$this->typeCons' WHERE id=".(int)$this->id;    // requete sql
        $res=DB::connect()->prepare($qr);   // preparer la requete
        if($res->execute()){    // executer la requete
            return 'ok';    
        }
        else{
            return 'no ip';
        }
    }

    public function editRdv()   
    {
        $qr='SELECT * from rendezvous where id='.(int)$this->id;    // requete sql
        $res=DB::connect()->query($qr);  // preparer la requete
       if( $row=$res->fetch(PDO::FETCH_ASSOC)){ 
       
        return $row;
        
       }
       else{
        return array("message"=>"pas de rendez-vous avec cette cle");   // return no
       }
        
        //    $res->close();
           $res=null;
      
    }


     public function supprimerRdv()
    {
            $qr="DELETE from rendezvous where id=".(int)$this->id;  // requete sql
            $res=DB::connect()->query($qr); // preparer la requete
    }


}



?>