<?php
    class psy {
        private ?int $id = null;
        private ?string $nom = null;
        private ?string $prénom = null;
        private ?string $email = null;
        private ?string $mdp= null;
        private ?string $adresse = null;
        private ?string $spécialité = null;
        private ?string $role = null;


        public function __construct(string $nom, string $prénom, string $email,string $mdp,string $adresse,string $spécialité,string $role){
            //$this->idAlbum = $id;
            $this->nom = $nom;
            $this->prénom = $prénom;
            $this->email= $email;
            $this->mdp = $mdp;
            $this->adresse = $adresse;
            $this->spécialité = $spécialité;
            $this->role = $role;

        }
////////////////////////Getters//////////////////////
        public function getIdPsy () :string {
            return $this->id;
        }

        public function getNom () :string{
            return $this->nom ;
        }

        public function getPrenom () :string{
            return $this->prénom ;
        }

        public function getEmail () :string{
            return $this->email ;
        }
        public function getRole ()  :string{
            return $this->role;
        }

        public function getAdresse () :string{
            return $this->adresse ;
        }

        public function getSpecialite() :string{
            return $this->spécialité ;
        }

        public function getMotdepass() :string{
            return $this->mdp ;
        }
////////////////////////Setters//////////////////////
public function setNom (){
            $this->nom ;
       }

       public function setPrenom (){
            $this->prénom ;
       }

       public function setEmail (){
            $this->email ;
       }
       public function setRole () {
            $this->role;
       }

       public function setAdresse (){
            $this->adresse ;
       }

       public function setSpecialite(){
            $this->spécialité ;
       }

       public function setMotdepass(){
            $this->mdp ;
       }


   

    }
