<?php
class patient
{
    private  $id = null;
    private  $nom = null;
    private  $prénom = null;
    private  $email = null;
    private  $mdp = null;
    private  $averti = null;
    private  $role = null;


    public function __construct($nom,  $prénom,  $email, $mdp, $averti, $role)
    {
        //$this->idAlbum = $id;
        $this->nom = $nom;
        $this->prénom = $prénom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->averti = $averti;
        $this->role = $role;
    }
    ////////////////////////Getters//////////////////////
    public function getIdpatient()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prénom;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function getaverti()
    {
        return $this->averti;
    }



    public function getMotdepass()
    {
        return $this->mdp;
    }
    public function getRole()
    {
        return $this->role;
    }
    ////////////////////////Setters//////////////////////
    public function setNom()
    {
        $this->nom;
    }

    public function setPrenom()
    {
        $this->prénom;
    }

    public function setEmail()
    {
        $this->email;
    }


    public function setaverti()
    {
        $this->averti;
    }



    public function setMotdepass()
    {
        $this->mdp;
    }


    public function setRole()
    {
        $this->role;
    }
}
