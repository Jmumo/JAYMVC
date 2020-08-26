<?php

class Post
{

    private $db;

    public function __construct()
    {

        $this->db = new Database;

    }

    public function getPosts()
    {

        $this->db->query('SELECT * ,posts.id as PostId,

                                     users.id as UserId,

                                     posts.created_at as posttime,

                                     users.created_at as usertime
         
                                     FROM posts  INNER JOIN users
                                     
                                      on posts.user_id = users.id

                                      
                                      
                                      ORDER BY posts.created_at DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addpost($data)
    {
        $this->db->query('INSERT INTO posts (title,body,user_id,image) VALUES(:title,:body,:user_id,:image)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':image', $data['image']);

        if ($this->db->execute()) {

            return true;

        } else {

            return false;

        }
    }

    public function getpost($id)
    {
        $this->db->query('SELECT *,posts.id as PostId
           
            FROM posts 
           
           INNER JOIN users
           
           
            WHERE posts.id = :id  ');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updatepost($data)
    {
        $this->db->query('UPDATE Posts SET title=:title,body=:body,image=:image WHERE id=:id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':image', $data['image']);

        if ($this->db->execute()) {

            return true;

        } else {

            return false;

        }
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM posts WHERE id =:id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {

            return true;

        } else {

            return false;

        }
    }
}

?>
