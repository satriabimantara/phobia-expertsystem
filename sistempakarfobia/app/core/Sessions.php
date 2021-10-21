<?php
class Session
{
    public static function setSessionLogin($nama_session, $user)
    {
        $_SESSION[$nama_session] = [
            'status' => 'active',
            'id_user' => $user['id_user'],
        ];
        $_SESSION['user_login'] = [
            'id_user' => $user['id_user'],
            'nama_user' => $user['nama_user'],
            'email_user' => $user['email_user'],
            'hp_user' => $user['hp_user'],
            'username_user' => $user['username_user'],
        ];
        $_SESSION['data_user'] = [
            'Nama' => $user['nama_user'],
            'Email' => $user['email_user'],
            'Nomor Handphone' => $user['hp_user'],
            'Username' => $user['username_user'],
            'Tanggal Lahir' => $user['tgllahir_user'],
            'Alamat' => $user['alamat_user'],
        ];
    }

    public static function unsetSessionLogin($nama_session)
    {
        unset($_SESSION[$nama_session]);
        unset($_SESSION['data_user']);
    }
    public static function checkSessionLogin($nama_session)
    {
        if (isset($_SESSION[$nama_session])) {
            return 1;
        } else {
            return 0;
        }
    }
    public static function getSessionUser()
    {
        return $_SESSION['user_login'];
    }
    public static function setSession($nama_session, $value)
    {
        $_SESSION[$nama_session] = array();
        $_SESSION[$nama_session] = $value;
    }
    public static function getSession($nama_session)
    {
        return $_SESSION[$nama_session];
    }
}
