<?php
class Login_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function isValidAdmin($data)
    {
        $return_value = false;
        $message = "";
        $query = "SELECT * FROM admin WHERE username_admin = :username_admin";
        $this->db->query($query);
        $this->db->bind_param('username_admin', $data['username_admin']);
        $this->db->execute();
        $admin = $this->db->single();
        if ($admin) {
            if (md5($data['password_admin']) == $admin['password_admin']) {
                $return_value = true;
                return array($return_value, $message);
            } else {
                $return_value = false;
                $message = "Password yang dimasukkan salah!";
                return array($return_value, $message);
            }
        } else {
            $return_value = false;
            $message = "Username yang dimasukkan salah!";
            return array($return_value, $message);
        }
    }
}
