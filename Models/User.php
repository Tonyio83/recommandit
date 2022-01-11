<?php

/**
 * Description of User
 *
 * @author Anthony
 */
class User {

    /**
     * @var type integer
     */
    public $id;

    /**
     * @var type string
     */
    public $nickname;

    /**
     * @var type string
     */
    public $lastname;

    /**
     * @var type string
     */
    public $firstname;

    /**
     * @var type date
     */
    public $birthdate;

    /**
     * @var type string
     */
    public $image;

    /**
     * @var type string
     */
    public $mail;

    /**
     * @var type string
     */
    public $password;

    /**
     * @var type integer
     */
    public $role_id = 2;

    /**
     * @var type datetime
     */
    public $register_at;

    /**
     * @var type boolean
     */
    public $db;

    public function __construct($_nickname = '', $_lastname = '', $_firstname = '', $_birthdate = '', $_image = '', $_mail = '', $_password = '') {
        $this->nickname = $_nickname;
        $this->lastname = $_lastname;
        $this->firstname = $_firstname;
        $this->birthdate = $_birthdate;
        $this->image = $_image;
        $this->mail = $_mail;
        $this->password = $_password;
        $this->db = Database::getInstance();
    }

    public function create() {
        /* code pour créer un utilisateur */
        $sql = 'INSERT INTO `users`(`nickname`,`lastname`,`firstname`,`birthdate`,`image`,`mail`,`password`,`role_id`) VALUES (:nickname, :lastname, :firstname, :birthdate, :image, :mail, :password, :role_id)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':nickname', $this->nickname, PDO::PARAM_STR);
        $req->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $req->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $req->bindValue(':image', $this->image, PDO::PARAM_STR);
        $req->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':role_id', $this->role_id, PDO::PARAM_INT);

        if ($req->execute()) {
            $id = $this->db->lastInsertId();
            $this->id = $id;
            return $this;
        }
        return false;
    }

    public function getOne() {
        /* code pour afficher les informations de l'utilisateur par le pseudo ou l'id */
        $sql = 'SELECT `id`,`nickname`,`lastname`,`firstname`,`birthdate`,`image`,`mail`, `register_at`,`password`,`role_id` FROM `users` WHERE `id` = :id OR `mail` = :mail';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->bindValue(':mail', $this->mail, PDO::PARAM_STR);

        if ($req->execute()) {
            $user = $req->fetch(PDO::FETCH_OBJ);
            if ($user) {
                $this->id = $user->id;
                $this->nickname = $user->nickname;
                $this->lastname = $user->lastname;
                $this->firstname = $user->firstname;
                $this->birthdate = $user->birthdate;
                $this->image = $user->image;
                $this->mail = $user->mail;
                $this->register_at = $user->register_at;
                $this->password = $user->password;
                $this->role_id = $user->role_id;
                return $this;
            }
        }
        return false;
    }

    public function checkEmail() {
        /* code pour verifier que le mail n'existe pas déjà */
        $sql = 'SELECT COUNT(`id`) AS number_user FROM `users` WHERE `mail` = :mail';
        $req = $this->db->prepare($sql);
        $req->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $exist_user = false;
        if ($req->execute()) {
            $result = $req->fetchColumn(0);
            if (is_numeric($result) && $result > 0) {
                $exist_user = true;
            }
        }
        return $exist_user;
    }

    public function updateUserInfos() {
        /* code pour modifier un user */
        $sql = 'UPDATE `users` SET `nickname` = :nickname, `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `mail` = :mail WHERE `id` = :id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->bindValue(':nickname', $this->nickname, PDO::PARAM_STR);
        $req->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $req->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $req->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if ($req->execute()) {
            return $this;
        }
        return false;
    }

    public function updateUserPassword() {
        /* code pour modifier un mot de passe user */
        $sql = 'UPDATE `users` SET `password` = :password '
                . 'WHERE `id` = :id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        if ($req->execute()) {
            return $this;
        }
        return false;
    }

    public function delete() {
        /* code pour supprimer un utilisateur */
        $sql = 'DELETE FROM `users` WHERE `id` = :id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($req->execute()) {
            return $this;
        }
        return false;
    }

}
