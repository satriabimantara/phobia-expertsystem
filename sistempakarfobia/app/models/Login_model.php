<?php
class Login_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function validateExactPassword($pass, $repeat_pass)
    {
        if ($pass != $repeat_pass) {
            return 0;
        } else {
            return 1;
        }
    }
    public function checkAnySameUsername($current_username)
    {
        $query = "SELECT * FROM user WHERE username_user = :username_user";
        $this->db->query($query);
        $this->db->bind_param("username_user", $current_username);
        $this->db->execute();
        $data = $this->db->single();
        if ($data != false) {
            return 1;
        } else {
            return 0;
        }
    }
    public function insertNewUser($data)
    {
        // check apakah username sudah ada di database
        $isAnySameUsername = $this->checkAnySameUsername($data['username_user']);
        $isSamePassword = $this->validateExactPassword($data['password_user'], $data['repeat_password_user']);
        if (!$isAnySameUsername) {
            if ($isSamePassword) {
                $data['password_user'] = md5($data['password_user']);
                $query = "INSERT INTO user VALUES ('',:nama_user,:email_user,:hp_user,:username_user,:password_user,:tgllahir_user,:alamat_user)";
                $this->db->query($query);
                $this->db->bind_param("nama_user", $data['nama_user']);
                $this->db->bind_param("email_user", $data['email_user']);
                $this->db->bind_param("hp_user", $data['hp_user']);
                $this->db->bind_param("username_user", $data['username_user']);
                $this->db->bind_param("password_user", $data['password_user']);
                $this->db->bind_param("tgllahir_user", $data['tgllahir_user']);
                $this->db->bind_param("alamat_user", $data['alamat_user']);
                $this->db->execute();
                $return_value = $this->db->rowCount();
                $message = "";
                return array($return_value, $message);
            } else {
                $return_value = 0;
                $message = "Harap masukkan password yang sama dua kali!";
                return array($return_value, $message);
            }
        } else {
            $return_value = 0;
            $message = "Username sudah digunakan!";
            return array($return_value, $message);
        }
    }
    public function isValidUser($data)
    {
        $return_value = false;
        $message = "";
        $query = "SELECT * FROM user WHERE username_user = :username_user";
        $this->db->query($query);
        $this->db->bind_param('username_user', $data['username_user']);
        $this->db->execute();
        $user = $this->db->single();
        if ($user) {
            if (md5($data['password_user']) == $user['password_user']) {
                $return_value = true;
                return array($return_value, $message, $user);
            } else {
                $return_value = false;
                $message = "Password yang dimasukkan salah!";
                return array($return_value, $message, $user);
            }
        } else {
            $return_value = false;
            $message = "Username yang dimasukkan salah!";
            return array($return_value, $message, $user);
        }
    }
}
