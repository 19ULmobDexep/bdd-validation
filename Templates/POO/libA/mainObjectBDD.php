<?php


class mainObjectBDD {


   protected static $tableName;
   protected static $_authorisedUpdate;

    public function __construct($id) {
        // requet BDD get properties for $id

        if(!empty($id)){
            $db = BDD::getConnexion();
            $query ='SELECT * FROM voituredata.post WHERE id='.$id;
            $result = $inst->fetch(PDO::FETCH_ASSOC);
            foreach($result as $k => $v)

        }
    
    }

    //! Fonction update------------------------------------------------------

    public function update($property, $value){

        $properties = array_keys(get_object_vars($this));
        if(in_array($property, $properties)){
            $this->$property = $value ;
        }   

        return $this->__save();
    }

    //! Fonction de sauvegarde-----------------------------------------------

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

        $query = 'UPDATE voituredata.post 
            SET '.implode(',',$update).'
            WHERE id='.$this->id ;
        var_dump($query);
    

        $res = $bdd->query($query);

        return !!($res && $res->rowCount());
    }


// SUivant : les 3 static

    //!FOnction create ---------------------------------------------------------------------

    public static function create($props){
        $bdd = BDD::getConnexion();
        $properties = [];
        $values = [];
        foreach($props as $p => $v) {
            if(in_array($p, Post::$_authorisedUpdate)) {
                $properties [] = $p ;
                $values[] = $bdd->quote($v) ;
            }
        }
        $query = 'INSERT INTO  voituredata.post ('.implode(',', $properties).'
                 VALUES ('.implode(',', $values).')';

        $bdd->query($query) ;
        $id = $bdd->lastInsertId();


        return new Post($id) ;
    }


    //!FOnction findall

    public static function findAll($filters=[]){        
        $bdd = BDD::getConnexion();
        $where = '';
        $clauses=[];
        foreach($filters as $k => $f) {
            $clauses[] = $k.'='.$bdd->quote($f);
        }
        if(!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }

        $query = 'SELECT * FROM'.static::$tableName.' '.$where;

        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, get_called-class());

    }



}
