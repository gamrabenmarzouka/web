<?php
    class quiz {
        private ?int $idquiz = null;
        private ?string $title = null;
        private ?string $descrip = null;
        private ?int $confirmation = null;
        private ?int $score= null;
        private ?string $min = null;
        private ?string $max = null;
        private ?int $nbrques = null;
        private ?string $type = null;


        public function __construct(string $title, string $descrip, int $confirmation,int $score,string $min,string $max,int $nbrques ,string $type){
            //$this->idAlbum = $id;
            $this->nom = $title;
            $this->descrip = $descrip;
            $this->confirmation= $confirmation;
            $this->score = $score;
            $this->min = $min;
            $this->max = $max;
            $this->nbrques = $nbrques;
            $this->type = $type;

        }
////////////////////////Getters//////////////////////
        public function getIdquiz () :string {
            return $this->idquiz;
        }

        public function getNom () :string{
            return $this->title ;
        }

        public function getDescrip () :string{
            return $this->descrip ;
        }

        public function getConfirmation () :string{
            return $this->confirmation ;
        }
        public function getNbrques ()  :string{
            return $this->nbrques;
        }

        public function getType ()  :string{
            return $this->type;
        }

        public function getMin () :string{
            return $this->min ;
        }

        public function getMax() :string{
            return $this->max ;
        }

        public function getScore() :string{
            return $this->score ;
        }
////////////////////////Setters//////////////////////
public function setTitle (){
            $this->title ;
       }

       public function setDescrip (){
            $this->descrip ;
       }

       public function setConfirmation (){
            $this->confirmation ;
       }
       public function setNbrques () {
            $this->nbrques;
       }

       public function setType ()  :string{
            return $this->type;
        }

       public function setMin (){
            $this->min ;
       }

       public function setMax(){
            $this->max ;
       }

       public function setScore(){
            $this->score ;
       }


   

    }
