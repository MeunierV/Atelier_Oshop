<?php

namespace App\Models;

use App\Utils\Database;

class AppUser extends CoreModel {

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $role;

    /**
     * @var int
     */
    private $status;

    /**
     * Méthode permettant la récupération d'un model en base
     */
    public static function find($userId)
    {
        // pour l'instant, la méthode ne fait rien, on l'implémente juste pour respecter les méthodes abstraites de CoreModel
    }

    /**
     * Méthode permettant la récupération de tous les models en base
     */
    public static function findAll()
    {
        // pour l'instant, la méthode ne fait rien, on l'implémente juste pour respecter les méthodes abstraites de CoreModel
    }
    
    /**
     * Récupérer un utilisateur via son e-mail
     */
    public static function findByEmail($email)
    {
    
    }

    /**
     * Méthode permettant la création du model en base
     */
    public function insert()
    {
        // pour l'instant, la méthode ne fait rien, on l'implémente juste pour respecter les méthodes abstraites de CoreModel
    }

    /**
     * Méthode permettant la mise à jour du model en base
     */
    public function update()
    {
        // pour l'instant, la méthode ne fait rien, on l'implémente juste pour respecter les méthodes abstraites de CoreModel
    }

    /**
     * Méthode permettant la suppression du model en base
     */
    public function delete()
    {
        // pour l'instant, la méthode ne fait rien, on l'implémente juste pour respecter les méthodes abstraites de CoreModel
    }


    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Get the value of password
     *
     * @return  string
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param  string  $password
     */ 
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * Get the value of firstname
     *
     * @return  string
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param  string  $firstname
     */ 
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get the value of lastname
     *
     * @return  string
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param  string  $lastname
     */ 
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get the value of role
     *
     * @return  string
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @param  string  $role
     */ 
    public function setRole(string $role)
    {
        $this->role = $role;
    }

    /**
     * Get the value of status
     *
     * @return  int
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param  int  $status
     */ 
    public function setStatus(int $status)
    {
        $this->status = $status;
    }
}
