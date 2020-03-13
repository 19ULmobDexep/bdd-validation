<?php

class Post {

    /**
     * titre
     * @var mixed|null
     */
    protected $title = null;
    /**
     *textes
     *@var mixed|null
     */
    protected $text = null;

    protected $idAuthor=null;
    /**
     * @var Author
     */
    protected $author=null;
    protected $idBlog=null;
    /**
     * @var Blog
     */
    protected $blog=null;
    /**
     * @var array Categ
     */
    protected $categs=[];
    /**
     *date
     *@var mixed|null
     */
    protected $date = null;
    /**
     *dernière édition
     *@var mixed|null
     */
    protected $lastEdit = null;
     /**
      * id unique
      * @var null
      */
    protected $id = null;
    

    public static $_authorisedUpdate = ['title', 'text', 'slug'];
    protected static $tableName='post';


    public function __construct($id=null) {
        parent::__construct($id) ;
        $this->blog = new Blog($this->idBlog) ;
        $this->author = new Author($this->idAuthor) ;
        $this->categs = Categ::findAll(['idPost'=>$this->id]) ;
    }

    /**
     * Récupère un article en fonction de son slug
     * @param $slug
     * @return Post
     */
    public static function getBySlug($slug) {

        return self::findOne(['slug'=>$slug]) ;
    }



    public function printTitle() {
        echo $this->title ;
    }
    
    public function getTitle() {
        return $this->title ;
    }


    public function printText() {
        echo $this->text ;
    }
    
    public function getText() {
        return $this->text ;
    }

    public function changeText($text){

       return $this->update('text', $text) ;


    }

    public function paint($text) {
        return $this->update('text', $text);
    }



    public function update($property, $value){

        $properties = array_keys(get_object_vars($this));
        if(in_array($property, $properties)){
            $this->$property = $value ;
        }   

        return $this->__save();
    }


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


     /**
     * Instancie un objet Voiture à partir de sa plaque d'immatriculation
     * @param $immat plaque d'Immat
     * @return Voiture
     */

    public static function getFromText($text) {
        $bdd = BDD::getConnexion() ;
        $query = 'SELECT id FROM voituredata.post WHERE text="'.$text.'"';
        $req = $bdd->query($query);
        $id = $req->fetch(PDO::FETCH_UNIQUE|PDO::FETCH_COLUMN) ;

        var_dump($query) ;

        return new Post($id) ;
    }



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

        $query = 'SELECT * FROM voituredata.post'.$where;
        var_dump($query);
        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, 'Post');

    }
   

}
