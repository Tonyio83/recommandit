<?php

/**
 * Description of User_Medias
 *
 * @author Anthony
 */
class User_Medias {
    /**
     * @var type integer
     */
    public $medias_id;
    /**
     *
     * @var type integer
     */
    public $users_id;
    /**
     *
     * @var type boolean
     */
    public $db;

    public function __construct($_medias_id = '', $_users_id = '') {
        $this->db = Database::getInstance();
        $this->medias_id = $_medias_id;
        $this->users_id = $_users_id;
    }
    public function define() {
        /* code pour définir les catégories favorites des utilisateurs */
        $sql = 'INSERT INTO `users_medias`(`medias_id`, `users_id`) VALUES (:medias_id, :users_id)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':medias_id', $this->medias_id, PDO::PARAM_INT);
        $req->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
        $req->execute();
    }
    public function getIdMediasByIdUser() {
        /* code pour récupérer les medias_id par l' id de l'utilisateur */
        $sql = 'SELECT `medias_id` FROM `users_medias` WHERE `users_id` = :users_id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
        $req->execute();
        if ($req instanceof PDOStatement) {
            $genresIdList = $req->fetchAll(PDO::FETCH_ASSOC);
        }
        return $genresIdList;
    }
    public function getMediasById() {
        /* code pour afficher les informations d'un contenu */
        $sql = 'SELECT um.users_id ,m.`media`, um.`medias_id` FROM `users_medias` AS um RIGHT JOIN `medias` AS m ON um.`medias_id` = m.`id` WHERE um.`users_id` = :users_id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
        $req->execute();
         if ($req instanceof PDOStatement) {
           $medias = $req->fetchAll(PDO::FETCH_ASSOC);
        }
        return $medias;
    }
    public function delete() {
        /* code pour modifier les genres d'un contenu */
        $sql = 'DELETE FROM `users_medias` WHERE `users_id` = :users_id AND `medias_id` = :medias_id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
        $req->bindValue(':medias_id', $this->medias_id, PDO::PARAM_INT);
        $req->execute();
    }
}
