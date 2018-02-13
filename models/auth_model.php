<?php
defined('ROOT') or exit('No direct script access allowed');

class Auth_model extends Model {

	public function getUser($login, $pass)
	{
		$sql = "SELECT * FROM users WHERE login = ? AND password = ? ";
		return $this->db->query($sql, array($login, $pass))->fetch();
	}
}