<?php 
class Poke extends CI_Model{
	function show_poke_history($user_id)
	{	
		$query = "select count(*) as poke_count, poker, users.name from pokes left join users on pokes.poker = users.id where poked = ? group by poker";
		return $this->db->query($query, array($user_id))->result_array();
	}
	function poke_person($poker, $poked)
	{
		$query ="insert into pokes (poker, poked) values (?, ?)";
		return $this->db->query($query, array($poker, $poked));
	}
	function show_people()
	{
		$query = "select users.id, users.name, users.alias, users.email, count(pokes.id) as poke_count from users left join pokes on poked = users.id group by users.id";
		return $this->db->query($query)->result_array();
	}
	function show_total_poke_count_by_user_id($user_id)
	{
		$query = "SELECT COUNT(*) as poke_count FROM pokes where poked = ?";
		$result = $this->db->query($query, array($user_id))->row_array();
		return $result['poke_count'];
	}

}