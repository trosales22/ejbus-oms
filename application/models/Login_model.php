<?php
class Login_model extends CI_Model {

	private function _generatePIN($digits = 4) {
		$i = 0; //counter
		$pin = ""; //our default pin is blank.
		while ($i < $digits) {
		  //generate a random number between 0 and 9.
		  $pin .= mt_rand(0, 9);
		  $i++;
		}
		return $pin;
	}

	public function loginUser(array $data){
		$params = array(
					$data['username_or_email'],
					$data['username_or_email'],
					$data['password'], 
					'Y'
				);
		$query = "
			SELECT 
				username
			FROM 
				users
			WHERE 
				username = ? OR email = ? AND password = ? AND active_flag = ?";
				
		$stmt = $this->db->query($query, $params);
		return $stmt->num_rows();
	}
	
	public function getUserInformation($username_or_email){
		$params = array($username_or_email, $username_or_email, 'Y');
		$query = "
			SELECT 
				A.user_id, A.username, A.email, A.password, B.role_code
			FROM 
				users A
			LEFT JOIN 
				user_roles B ON A.user_id = B.user_id
			WHERE 
				A.username = ? OR A.email = ? AND A.active_flag = ?
			";

		$stmt = $this->db->query($query, $params);
		return $stmt->result();
	}

	public function getUserRole($user_id){
		$params = array($user_id);
		$query = "
			SELECT 
				user_id,role_code
			FROM 
				user_roles
			WHERE 
				user_id = ?";

		$stmt = $this->db->query($query, $params);
		return $stmt->result();
	}
}
