<?php

/**
 * Description of Content_Genres
 *
 * @author lmam019
 */
class Content_Genres {

    /**
     * @var type integer
     */
    public $contents_id;

    /**
     *
     * @var type integer
     */
    public $genres_id;

    /**
     *
     * @var type boolean
     */
    public $db;

    public function __construct($_contents_id = '', $_genres_id = '') {
        $this->db = Database::getInstance();
        $this->contents_id = $_contents_id;
        $this->genres_id = $_genres_id;
    }

    public function define() {
        /* code pour définir les genres des contenus */
        $sql = 'INSERT INTO `contents_genres`(`contents_id`, `genres_id`) VALUES (:contents_id, :genres_id)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':contents_id', $this->contents_id, PDO::PARAM_INT);
        $req->bindValue(':genres_id', $this->genres_id, PDO::PARAM_INT);
        $req->execute();
    }

    public function delete() {
        /* code pour modifier les genres d'un contenu */
        $sql = 'DELETE FROM `contents_genres` WHERE `contents_id` = :contents_id AND `genres_id` = :genres_id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':contents_id', $this->contents_id, PDO::PARAM_INT);
        $req->bindValue(':genres_id', $this->genres_id, PDO::PARAM_INT);
        $req->execute();
    }

    public function getIdGenresByIdContent() {
        /* code pour récupérer les genres_id par l' id du contenu */
        $sql = 'SELECT `genres_id` FROM `contents_genres` WHERE `contents_id` = :contents_id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':contents_id', $this->contents_id, PDO::PARAM_INT);
        $req->execute();
        if ($req instanceof PDOStatement) {
            $genresIdList = $req->fetchAll(PDO::FETCH_ASSOC);
        }
        return $genresIdList;
    }

}
