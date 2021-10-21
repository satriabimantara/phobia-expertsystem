<?php
class User_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getSpesificUser($id_user)
    {
        $query = "SELECT * FROM user WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind_param("id_user", $id_user);
        $this->db->execute();
        return $this->db->single();
    }
    public function updateUser($data)
    {
        $query = "UPDATE user SET
                    nama_user = :nama_user,
                    email_user = :email_user,
                    hp_user = :hp_user,
                    tgllahir_user = :tgllahir_user,
                    alamat_user = :alamat_user
                WHERE id_user=:id_user";
        $this->db->query($query);
        $this->db->bind_param("id_user", $data['id_user']);
        $this->db->bind_param("nama_user", $data['nama_user']);
        $this->db->bind_param("email_user", $data['email_user']);
        $this->db->bind_param("hp_user", $data['hp_user']);
        $this->db->bind_param("tgllahir_user", $data['tgllahir_user']);
        $this->db->bind_param("alamat_user", $data['alamat_user']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
