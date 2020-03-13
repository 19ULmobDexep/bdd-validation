<?php

class Author extends mainObjectBDD {

    require_once 'bdd.php';
    require_once 'mainObjectBDD.php';
    require_once 'categs.php';
    require_once 'posta.php';

    //__constructor
    // getAllPost()
    //getAllCategs()
    // findByPseudo
    //

    
   protected $id;
   protected $pseudo;
   protected $description;
   protected $avatar;
   protected static $tableName='auteur'
   public static $_authorisedUpdate = ['pseudo', 'description', 'avatar'];


   //! All Post----------------

   public function getAllPost($filters=[]) {
    $filters['idAuthor'] = $this->id ;
    return Post::findAll($filters) ;
    }

   //! All catégorie-------------
   public function getAllCategs() {
        $bdd = BDD::getConnexion();
        $query = '';
        $res = $bdd->query($query);
        return $res->fetch(PDO::FETCH_CLASS, 'Categs');
    }

    
  //! By pseudo------------
   
   public static function getFromPseudo($pseudo) {

    return self::findOne(['pseudo'=>$pseudo])
    }
   
}

  



  // Fonction findAll voiture //      


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


