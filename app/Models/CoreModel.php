<?php

namespace App\Models;

// Classe mère de tous les Models
// On centralise ici toutes les propriétés et méthodes utiles pour TOUS les Models

// Une classe abstraite ne peux pas etre instanciée 
// Elle sert juste de base a des classes enfant.
// Dans une classe abstraite on va pouvoir indiquer 
// les methodes que les enfants doivent implementer.
// Si ils ne les implémente pas, ce ne sont pas ses enfants !



abstract class CoreModel {

    // je viens CONTRAINDRE tous les enfants de CoreModel
    // a disposer OBLIGATOIREMENT des methodes suivantes : 
    abstract static public function find($id);
    abstract static public function findAll();
    abstract public function insert();
    abstract public function update();
    abstract public function delete();


    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $created_at;
    /**
     * @var string
     */
    protected $updated_at;


    /**
     * Get the value of id
     *
     * @return  int
     */ 
    //! ATTENTION on a vu que la mention ": int"
    // nous contraint le type de ce que va renvoyer 
    // la methode getId, pour lui permettre de renvoyer 
    // du null, je met juste un point d'interogation devant
    // le int 
    public function getId() : ?int
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     *
     * @return  string
     */ 
    public function getCreatedAt() : string
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     *
     * @return  string
     */ 
    public function getUpdatedAt() : string
    {
        return $this->updated_at;
    }

    // Cette nouvelle methode 
    // me permet de ne plus m'embeter avec 
    // $category->insert(); ou $category->update();
    // désormais j'aurais juste a faire 
    // $category->save();

    public function save() {
        if($this->id != null){
            return $this->update();
        } else{
            return $this->insert();
        }
    }



}
