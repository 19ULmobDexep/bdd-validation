<?php

require_once 'bdd.php';
require_once 'mainObjectBDD.php';
require_once 'posta.php';

class Categ extends MainObjectBDD {

    // __construction 
    // getAllPosts


    protected $id;
    protected $title;
    protected $description;
    protected static $tableName='categs' ;
    protected static $_authorisedUpdate = ['title', 'description'];


    //-------------------------GetAllPosts

    public function getALllPosts($filters=[]) {
        $bdd = BDD::getConnexion();
        $query = 'SELECT post.*
                  FROM post
                  INNER JOIN categ_post ON post.id=categ_post.idPost
                 WHERE idCategs='.$this->id;
        $res = $bdd->query($query);
        return $res->fetchAll(PD::FETCH_CLASS, 'POST') ;
    }

    public static function findOne($filters=[]) {
        $bdd = BDD::getConnexion();
        $where = '';
        $clauses = [];
        foreach ($filters as $k =>$filter) {
            $clauses[] = $k.'='.$bdd->quote($filter) ;
        }
        if(!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.static::$tableName.' as c INNER JOIN categ_post as cp ON c.id=cp.idCategs '.$where ;
        $res = $bdd->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $res->fetch();
    }


    public static function findAll(){        
        $bdd = BDD::getConnexion();
        $where = '';
        $clauses = [];
        foreach ($filters as $k =>$filter) {
            $clauses[] = $k.'='.$bdd->quote($filter) ;
        }
        if(!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.static::$tableName.' as c INNER JOIN categ_post as cp ON c.id=cp.idCategs '.$where ;
        $res = $bdd->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $res->fetch();
    }
}