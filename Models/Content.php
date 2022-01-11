<?php

/**
 * Description of Media_Content
 *
 * @author lmam019
 */
class Content {

    /**
     * @var type integer
     */
    public $id;

    /**
     * @var type string
     */
    public $content;

    /**
     * @var type integer
     */
    public $id_medias;

    /**
     * @var type boolean
     */
    public $db;

    public function __construct($_content = '', $_id_medias = '') {
        /* code pour le constructeur */
        $this->db = Database::getInstance();
        $this->content = $_content;
        $this->id_medias = $_id_medias;
    }

    public function addContent() {
        /* code pour créer du contenu dans les catégories */
        $sql = 'INSERT INTO `contents`(`content`,`id_medias`) VALUES (:content, :id_medias)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_medias', $this->id_medias, PDO::PARAM_INT);
        if ($req->execute()) {
            $id = $this->db->lastInsertId();
            $this->id = $id;
            return $this;
        }
        return false;
    }

    public function getAllByMedia() {
        /* code pour afficher tous les contenus */
        $sql = 'SELECT `id`, `content` FROM `contents` WHERE `id_medias` = :id_medias';
        $contentsList = [];
        $req = $this->db->prepare($sql);
        $req->bindValue(':id_medias', $this->id_medias, PDO::PARAM_INT);
        $req->execute();
        if ($req instanceof PDOStatement) {
            $contentsList = $req->fetchAll(PDO::FETCH_OBJ);
        }
        return $contentsList;
    }

    public function getPosterByMedia($idMedia) {
        /* code pour afficher les images des contenus avec une variable en paramètre */
        $sql = 'SELECT `id`, `content` FROM `contents` WHERE `id_medias` = :id_medias';
        $contentsList = [];
        $req = $this->db->prepare($sql);
        $req->bindValue(':id_medias', $idMedia, PDO::PARAM_INT);
        $req->execute();
        if ($req instanceof PDOStatement) {
            $contentsList = $req->fetchAll(PDO::FETCH_OBJ);
        }
        return $contentsList;
    }

    public function getContentById() {
        /* code pour afficher les informations d'un contenu */
        $sql = 'SELECT c.`id`, c.`content`, m.`media`, c.`id_medias` '
                . 'FROM `contents` AS c '
                . 'RIGHT JOIN `medias` AS m '
                . 'ON c.`id_medias` = m.`id` '
                . 'WHERE c.`id` = :id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($req->execute()) {
            $contentInfos = $req->fetch(PDO::FETCH_OBJ);
            if ($contentInfos) {
                $this->content = $contentInfos->content;
                $this->media = $contentInfos->media;
                $this->id_medias = $contentInfos->id_medias;
                return $this;
            }
        }
        return false;
    }

    public function updateContent() {
        /* code pour modifier un contenu */
        $sql = 'UPDATE `contents` SET `content` = :content, `id_medias` = :id_medias '
                . 'WHERE `id` = :id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_medias', $this->id_medias, PDO::PARAM_INT);
        if ($req->execute()) {
            return $this;
        }
        return false;
    }

    public function delete() {
        /* code pour supprimer un contenu */
        $sql = 'DELETE FROM `contents` WHERE `id` = :id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($req->execute()) {
            return $this;
        }
        return false;
    }

}
