<?php
class Auteur {

        /**
         * Numero du Auteur
         *
         * @var int
         */
    private $num;

    private $numNas;

        /**
         * Nom du Auteur
         *
         * @var string
         */
    private $nom;
    
        /**
         * Nom du Auteur
         *
         * @var string
         */
    private $prenom;
    
        /**
     * Get nom du Auteur
     *
     * @return  string
     */ 
    public function getPrenom3()
    {
        return $this->prenom;
    }

    /**
     * Set nom du Auteur
     *
     * @param  string  $prenom  Nom du Auteur
     *
     * @return  self
     */ 
    public function setPrenom3(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get numero du Auteur
     *
     * @return  int
     */ 
    public function getNum3()
    {
        return $this->num;
    }

     /**
     * Get numero du Auteur
     *
     * @return  int
     */ 
    public function getNum3A()
    {
        return $this->numNas;
    }

    /**
     * Get Nom du Auteur
     *
     * @return  string
     */ 
    public function getNom3() : string
    {
        return $this->nom;
    }

    /**
     * Set Nom du Auteur
     *
     * @param  string  $Nom  Nom du Auteur
     *
     * @return  self
     */ 
    public function setNom3(string $nom) : self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Set numero du Auteur
     *
     * @param  int  $num  Numero du Auteur
     *
     * @return  self
     */ 
    public function setNum3(int $num) :self
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Set numero du Auteur
     *
     * @param  int  $num  Numero du Auteur
     *
     * @return  self
     */ 
    public function setNum3A(int $numNas) :self
    {
        $this->numNas = $numNas;

        return $this;
    }

    /**
     * Retourne l'ensemble des Auteurs
     *
     * @return Auteur[] tableau d'objet Auteur
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("Select * from auteur");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Auteur');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve un Auteur par son num
     *
     * @param integer $id numéro du Auteur
     * @return Auteur objet Auteur trouvé
     */
    public static function findById(int $id) :Auteur
    {
        $req=MonPdo::getInstance()->prepare("Select * from auteur where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Auteur');
        $req->bindParam(':id', $id);
        $req->execute();
        $leResultats=$req->fetch();
        return $leResultats;
    }

    /**
     * Permet d'ajouter un Auteur
     *
     * @param Auteur $Auteur Auteur à ajouter
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function add(Auteur $auteur) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into auteur(nom, prenom) values(:nom, :prenom)");
        $nom=$auteur->getNom3();
        $prenom=$auteur->getPrenom3();
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de modifier une Auteur
     *
     * @param Auteur $Auteur Auteur à modifier
     * @return integer (1 si l'opération a réussi, 0 sinon)
     */
    public static function update(Auteur $auteur) :int
    {
        $req=MonPdo::getInstance()->prepare("update auteur set nom= :nom && prenom= :prenom && numNas= :numNationalite where num= :id");
        $num=$auteur->getNum3();
        $nom=$auteur->getNom3();
        $prenom=$auteur->getPrenom3();
        $numNas=$auteur->getNum3A();
        $req->bindParam(':id', $num);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':numNationalite', $numNas);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer une Auteur
     *
     * @param Auteur $Auteur
     * @return integer
     */
    public static function delete(Auteur $auteur) :int
    {
        $req=MonPdo::getInstance()->prepare("delete from auteur where num= :id");
        $num=$auteur->getNum3();
        $req->bindParam(':id', $num);
        $nb=$req->execute();
        return $nb;
    }
}
?>

