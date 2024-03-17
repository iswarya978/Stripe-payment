<?php
class User_model extends CI_Model {
    public function register($data) {
        // Insert user data into the database
        return $this->db->insert('users', $data);
    }

    public function login($username, $password) {
        // Fetch user data based on username
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->row();

        // Verify password
        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    public function getUserData($user_id) {
        // Retrieve user data from the database based on user_id
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }
}
?>
