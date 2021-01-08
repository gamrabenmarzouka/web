<?php
    class patient {
        private ?int $id = null;
        private ?string $nom = null;
        private ?string $prénom = null;
        private ?string $email = null;
        private ?string $mdp= null;
        private ?string $averti = null;
        private ?int $role = null;


        public function __construct(string $nom, string $prénom, string $email,string $mdp,string $averti,int $role){
            //$this->idAlbum = $id;
            $this->nom = $nom;
            $this->prénom = $prénom;
            $this->email= $email;
            $this->mdp = $mdp;
            $this->averti = $averti;
            $this->role = $role;
        }
////////////////////////Getters//////////////////////
        public function getIdpatient () :string {
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


        public function getaverti () :string{
            return $this->averti ;
        }



        public function getMotdepass() :string{
            return $this->mdp ;
        }
        public function getRole ()  :string{
            return $this->role;
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


       public function setaverti (){
            $this->averti ;
       }



       public function setMotdepass(){
            $this->mdp ;
       }


       public function setRole () {
        $this->role;
   }

    }
