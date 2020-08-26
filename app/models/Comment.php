<?php

class Comment
{

    private $db;

    public function __construct()
    {

        $this->db = new Database;
    }

    public function fetch($id)
    {

        $this->db->query('SELECT * ,comments.created_at as Tim
        FROM comments INNER JOIN users
        on users.id = comments.user_id 
        WHERE  comments.post_id = :id
        ORDER BY comments.created_at DESC');

        $this->db->bind(':id', $id);

        $results = $this->db->resultSet();

        return $results;

    }

    public function add($data)
    {
        $this->db->query('INSERT INTO comments (post_id,comments,user_id)VALUES(:post_id,:comments,:user_id)');

        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':comments', $data['comments']);
        $this->db->bind(':user_id', $data['user_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
}

?>
