<?php

require_once 'bdd.php';
require_once 'mainObjectBDD';
require_once 'categs.php';
require_once 'author.php';
require_once 'posta.php';


class Blog extends MainObjectBDD {

    // __constructor
    // getAllCategs
    // getAllPost
    // getAllAuthors

    protected $id;
    protected $titre;
    protected $url;
    protected $description;
    protected static $tableName='blog';
    protected static $_authoriseUpdate = ['titre', 'url', 'description'];

    //! All Catégorie--------------------------------

    public function getAllCategs() {
        $bdd = BDD::getConnexion();
        $query = '';
        $res = $bdd->query($query);
        return $res->fetch(PDO::FETCH_CLASS, 'Categ');
    }

    //! All Post-------------------------------------

    public function getAllPost($filters=[]) {
        return Post::findAll([$idBlog=>$this->id]) ;
    }


    //! All Author-----------------------------------

    public function getAllAUthors() {
        $bdd = BDD::getConnexion() ;
        $res = $bdd->query($query) ;
        return $res->fetchAll(PDO::FETCH_CLASS, 'Authors');
    }

}