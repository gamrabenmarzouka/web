<?php
class consultation
{
	private $id_patient;
	private $date_consultation;
	private $id_psy;
	private $tarif_consultation;
    private $etat;

		public function __construct($id_patient,$date_consultation,$id_psy,$tarif_consultation)
		{
			$this->id_patient=$id_patient;
			$this->date_consultation=$date_consultation;
			$this->id_psy=$id_psy;
			$this->tarif_consultation=$tarif_consultation;
			
		}

		public function get_id_patient()
		{
			return $this->id_patient;
		}

		public function set_id_patient($id_patient)
		{
			$this->id_patient = $id_patient;
		}
		//====================================


		
		//=====================================


		public function get_date_consultation()
		{
			return $this->date_consultation;
		}

		public function set_date_consultation($date_consultation)
		{
			$this->date_consultation = $date_consultation;
		}
		//======================================


		public function get_id_psy()
		{
			return $this->id_psy;
		}

		public function set_id_psy($id_psy)
		{
			$this->id_psy = $id_psy;
		}
		//========================================

		public function get_tarif_consultation()
		{
			return $this->tarif_consultation;
		}

		public function set_tarif_consultation($tarif_consultation)
		{
			$this->tarif_consultation = $tarif_consultation;
		}
		//====================================


		
		public function get_etat()
		{
			return $this->etat;
		}

		public function set_etat($etat)
		{
			$this->etat = $etat;
		}
		 
                
        
}	
?>