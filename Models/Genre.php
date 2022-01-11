<?php
/**
 * Description of Genre
 *
 * @author lmam019
 */
class Genre {
    /**
     * @var type integer
     */
    public $id;
    /**
     * @var type string
     */
    public $genre;
    /**
     * @var type boolean
     */
    public $db;

    public function __construct($_genre = '') {
       $this->db = Database::getInstance();
       $this->genre = $_genre;
    }
    public function getGenresByContent($content_id) {
        /* code pour afficher tous les genres par contenu */
        $sql = 'SELECT g.`genre`, cg.`genres_id` FROM `genres` AS g RIGHT JOIN `contents_genres` AS cg ON cg.`genres_id` = g.`id` WHERE cg.`contents_id` = :contents_id';
        $genresList = [];
        $req = $this->db->prepare($sql);
        $req->bindValue(':contents_id', $content_id, PDO::PARAM_INT);
        $req->execute();
        if ($req instanceof PDOStatement) {
            $genresList = $req->fetchAll(PDO::FETCH_OBJ);
        }
        return $genresList;
    }
  }
