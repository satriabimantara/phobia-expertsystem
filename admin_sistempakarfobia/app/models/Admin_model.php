<?php
class Admin_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllAdmin()
    {
        $query = "SELECT * FROM admin";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }
    public function insertNewAdmin($data)
    {
        $data['password_admin'] = md5($data['password_admin']);
        $query = "INSERT INTO admin VALUES ('',:nama_admin,:email_admin,:hp_admin,:username_admin,:password_admin)";
        $this->db->query($query);
        $this->db->bind_param("nama_admin", $data['nama_admin']);
        $this->db->bind_param("email_admin", $data['email_admin']);
        $this->db->bind_param("hp_admin", $data['hp_admin']);
        $this->db->bind_param("username_admin", $data['username_admin']);
        $this->db->bind_param("password_admin", $data['password_admin']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getSpesificAdmin($id_admin)
    {
        $query = "SELECT * FROM admin WHERE id_admin = :id_admin";
        $this->db->query($query);
        $this->db->bind_param("id_admin", $id_admin);
        $this->db->execute();
        return $this->db->single();
    }
    public function updateAdmin($data)
    {
        $query = "UPDATE admin SET
                    email_admin = :email_admin,
                    nama_admin = :nama_admin,
                    hp_admin = :hp_admin,
                    username_admin = :username_admin
                WHERE id_admin=:id_admin";
        $this->db->query($query);
        $this->db->bind_param("id_admin", $data['id_admin']);
        $this->db->bind_param("email_admin", $data['email_admin']);
        $this->db->bind_param("nama_admin", $data['nama_admin']);
        $this->db->bind_param("hp_admin", $data['hp_admin']);
        $this->db->bind_param("username_admin", $data['username_admin']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteAdmin($id_admin)
    {
        $query = "DELETE FROM admin WHERE id_admin=:id_admin";
        $this->db->query($query);
        $this->db->bind_param("id_admin", $id_admin);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
