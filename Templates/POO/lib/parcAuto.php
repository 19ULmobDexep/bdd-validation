<?php

require_once 'bdd.php';

class ParcAuto {

    protected $id=null;
    protected $name=null;
    protected $city=null;
    protected $

    public function __construct($id=null)
    {

        if(!empty($id)) {

            $bdd = BDD::getConnexion();
            $res = $bdd->query('SELECT * FROM parcAuto WHERE id='.$id) ;
            $result = $res->fetch(PDO::FETCH_ASSOC);
            foreach ($result as $k => $v) {
                $this->$k = $v;
            }

        }
    
    }

    public function getAllCars($filters=[]) {
        $filters['idParkAuto'] = $this->id ;
        $cars = Voiture::findAll($filters) ;
        return $cars ;
        
    }


    public static function findOne($filters=[]) {
        $bdd = BDD::getConnexion();
        $where='';
        $clauses=[];
        foreach ($filters as $k => $filter) {
        $clauses[] = $k.'='.$bdd->quote($filter);
        }
        if(!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ' , $clauses) ;
        }
        $res = $bdd->query('SELECT * FROM park_Auto '.$where.'LIMIT 0,1');
        $res->setFetchMode(PDO::FETCH_CLASS, 'ParcAuto') ;
        return $res->fetch();
    }
 
    public static function findAll($filters=[]) {
        $bdd = BDD::getConnexion();
        $where='';
        $clauses=[];
        foreach ($filters as $k => $filter) {
            $clauses[] = $k.'='.$bdd->quote($filter);    
        }
        $res = $bdd->query('SELECT * FROM park_Auto '.$where.'LIMIT 0,1');
        return $res->fetchAll(PDO::FETCH_CLASS, 'ParcAuto') ;
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
