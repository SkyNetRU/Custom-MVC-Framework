<?php
defined('ROOT') or exit('No direct script access allowed');

class Users_model extends Model {

	public function getUsers()
	{
		$sql = "SELECT * FROM users";
		return $this->db->query($sql)->fetchAll();
	}

	public function getUserbyId ($id = NULL) {
		if (!$id) {
			return false;
		}
		$sql = "SELECT * FROM users WHERE id = ?";
		$res = $this->db->query($sql, [$id]);
		return $res->fetch();
	}

	public function updateUser ($id, $user) {
		$allowed = array("login","role","email","password","is_active");
		$sql = "UPDATE users SET ".$this->db->pdoSet($allowed,$values, $user)." WHERE id = :id";
		$values["id"] = $id;
		return $this->db->query($sql, $values, TRUE);
	}

	public function addUser ($user) {
		$allowed = array("login","role","email","password","is_active");
		$sql = "INSERT users SET ".$this->db->pdoSet($allowed,$values, $user);
		return $this->db->query($sql, $values, TRUE);
	}

	public function deleteUser ($user_id) {
		$sql = "DELETE FROM users WHERE id = ?";
		return $this->db->query($sql, [$user_id], TRUE);
	}
}