<?php

//use PDO;

require_once("bdd.php");

class Voiture {


    /**
     * couleur de la voiture
     * @var mixed|null
     */
    protected $color = null;

    /**
     *nombre de portes
     *@var mixed|null
     */
    protected $nbDoors = null;

    /**
     *Immatriculation du véhicule
     *@var mixed|null
     */
    protected $immat = null;


     /**
     * Couleur FR
     *@var string
     */
    protected $couleur = null;



     /**
      * id unique
      * @var |null
      */
    protected $id = null;


    /**
     *  Id du parc automobile
     * 
     */
    protected $idparc = null;



     /**
      * Parc automobile 
      * @var ParcAuto
      */
    protected $parc = null;
    

    public static $_authorisedUpdate = ['immat', 'nbDoors', 'color'];

    /**
     * Voiture construction 
     * @param $id
     */


//! Fonction construct essentielle à mettre dans une class-----------------------------------------------------------------------

    public function __construct($id=null) {
        // requet BDD get properties for $id

        if(!empty($id)){

            $db = BDD::getConnexion();

            $inst = $db->query('SELECT * FROM voituredata.parcAuto LEFT JOIN voituredata.cars_color USING(color) WHERE id='.$id);
            if(!$inst)
                return;
            $result = $inst->fetch(PDO::FETCH_ASSOC);
            if(!result || empty($result['id']))
                return;
            var_dump($result);
            foreach ($result as $k => $v){
                $this->$k = $v;
            }

        }
        $this->parc = new ParcAuto($this);


        public function __set($name){
            $method = 'write'.ucfirst($name) ;
            var_dump($method);
            if(method_exists($this, $method)) {
                return $this->$method($value);
            }
            return null
        }

        public function __get($name) {
            $method = 'get'.ucfirst($name) ;
            if(method_exists($this, $method))
        }

        protected function readParcName() {
            return $this->parc->getName();
        }



        public function __call($name, $arguments) {
            var_dump($name);
            var_dump($arguments);
        
            $action = substr($name, 0, 3);
            $property = lcfirst(substr($name, 3));
        
            var_dump($action);
            var_dump($property);
        
            $properties = array_kews(get_object_vars($this));
           
        
            switch($action) {
                case 'set' :
                    if(!in_array($property, self::$_authorisedUpdate)) || !isset($arguments[0])) {
                        return null ;
                    }
                    return $this->update($property, $arguments[0]) ;
                    break;
                case 'get' :
                    if(!in_array($property, $properties)) {
                        return null ;
                    }
                    var_dump($property);
                    return $this->$property;
                    break;
                    
        
            }
        }
        
      
}












/*




    public function printColor() {
        echo $this->color ;
    }
   
    public function getColor() {
        return $this->color ;
    }


    
    public function printImmat() {
        echo $this->immat ;
    }
    
    public function getImmat() {
        return $this->immat ;
    }

    public function changeImmat($immat){

       return $this->update('immat', $immat) ;


    }
    */

    public function paint($color) {
        return $this->update('color', $color);
    }



//! Fonction pour update(changer) des données dans une base de donnée --------------------------------------------------------

    public function update($property, $value){


        $properties = array_keys(get_object_vars($this));
        if(in_array($property, $properties)){
            $this->$property = $value ;
        }   

        return $this->__save();
    }

//! Fonction pour sauvegarder la méthode et les données de la base de donné--------------------------------------------------

    protected function __save(){
        $bdd = BDD::getConnexion();


        $update = [];

        $properties = array_keys(get_object_vars($this));
        for($i = 0; $i < count($properties); $i++){
            if($properties[$i] == 'id'){
                continue;
            }
        
            $property = $properties[$i];
            var_dump($properties[$i]);
            $update[] = $property.'="'.$this->{$properties[$i]}.'"' ;
        }

        if (empty($update))
        return false;

        $query = 'UPDATE voituredata.parcAuto 
              SET '.implode(',',$update).'
              WHERE id='.$this->id ;
        var_dump($query);
     

        $res = $bdd->query($query);

        return !!($res && $res->rowCount());
    } 


    /**
     * Instancie un objet Voiture à partir de sa plaque d'immatriculation
     * @param $immat plaque d'Immat
     * @return Voiture
     */


//! Fonction pour récupérer l'immatriculation d'une voiture ou des voitures de la base de donnée-------------------------------------------------------------------
    public static function getFromImmat($immat) {

        $bdd = BDD::getConnexion() ;
        $query = 'SELECT id FROM voituredata.parcAuto WHERE immat="'.$immat.'"';
        $req = $bdd->query($query);
        $id = $req->fetch(PDO::FETCH_UNIQUE|PDO::FETCH_COLUMN) ;

        var_dump($query) ;

        return new Voiture($id) ;
    }

//! Fonction pour créer une nouvelle voiture dans la base de donnée-----------------------------------------------------------------------------------

    public static function create($props){
        $bdd = BDD::getConnexion();
        $properties = [];
        $values = [];
        foreach($props as $p => $v) {
            if(in_array($p, Voiture::$_authorisedUpdate)) {
                $properties [] = $p ;
                $values[] = $bdd->quote($v) ;
            }
        }
        $query = 'INSERT INTO  voituredata.parcAuto ('.implode(',', $properties).'
                 VALUES ('.implode(',', $values).')';

        $bdd->query($query) ;
        $id = $bdd->lastInsertId();


        return new Voiture($id) ;
    }



//!Fonction findAll pour retrouver toutes les voitures de notre base de donnée----------------------------------------------------------   


/*  public static function findAll(){        
        $bdd = BDD::getConnexion();
        $query = 'SELECT * FROM voituredata.parcAuto';
        $res = $bdd->query($query);
        $response = [];
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $response[] = new Voiture($row['id']);

        var_dump($row['id']);

        }
        return $response ;
    }
}*/

//! Fonction findall filters pour retrouver et filtrer les voitures de la base de donnée ------------------------------------------------------

    public static function findAll($filters=[]){        
        $bdd = BDD::getConnexion();

        //$k est égale à la clé de ta valeur et $f est égale à la valeur de ta clé// 
        $clauses=[];
        foreach($filters as $k => $f) {
            $clauses[] = $k.'='.$bdd->quote($f);
        }
        $where = '';
        if(!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }

        $query = 'SELECT * FROM voituredata.parcAuto LEFT JOIN voituredata.cars_color USING(color)'.$where;
        var_dump($query);
        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, 'Voiture');
    }

}


/*
    protected function __save(){
        $bdd = BDD::getConnexion();

        $query = 'UPDATE voituredata.parcAuto 
              SET color="'.$this->color.'",
                  immat="'.$this->immat.'",
                  nbDoors="'.$this->nbDoors.'"
              WHERE id='.$this->id ;
    $res = $bdd->query($query);

    return !!($res && $res->rowCount());
    }



    public function paint($color) {


        $this->color = $color ;
        return $this->__save();

}

    
  public function paint($color) {


        $this->color = $color;

        return($this->color == $color);
        if($this->color == $color){

            // si la mise en peinture s'est bien passée 
        return true;

        } else {
            
        //sinon
        return false;

        }
    }
}

//echo $maVoiture->getColor() ;

//echo $maVoiture->color = "red";

*/



