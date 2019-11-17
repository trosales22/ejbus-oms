<?php
class Home_model extends CI_Model {
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
}
