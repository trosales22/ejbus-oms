<?php
class Home_model extends CI_Model {
	public function get_reservation(){
		$query = "
			SELECT 
				A.reservation_id, A.reservation_origin, A.reservation_destination,
				A.reservation_date, A.reservation_time, B.bus_name,
				DATE_FORMAT(A.created_date, '%M %d, %Y %r') as date_reserved 
			FROM 
				reservation A
			LEFT JOIN 
				bus B ON A.reservation_bus = B.bus_id 
			ORDER BY 
				A.reservation_id DESC
			";

		$stmt = $this->db->query($query);
		return $stmt->result();
	}

	public function get_buses(){
		$query = "
			SELECT 
				bus_id, bus_name, DATE_FORMAT(created_date, '%M %d, %Y %r') as created_date 
			FROM 
				bus 
			ORDER BY 
				bus_id DESC
			";

		$stmt = $this->db->query($query);
		return $stmt->result();
	}

	public function reserve_now(array $reservation_params){
		try{	
			$this->db->insert('reservation', $reservation_params);
			$lastInsertedId = $this->db->insert_id();
		}catch(PDOException $e){
			$msg = $e->getMessage();
			$this->db->trans_rollback();
		}
	}
}
