<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $this->db->query(
            'SELECT posts.*, users.nom
                        FROM posts 
                        INNER JOIN users
                        ON posts.idUser = users.id
                        ORDER BY posts.date DESC'
        );

        return $this->db->findAll();
    }

    public function insertPost($arr)
    {
        $this->db->query('INSERT INTO posts(title, content, idUser, date) VALUES (:title, :content, :idUser, :date )');

        $this->db->bind('title', $arr['title'], PDO::PARAM_STR);
        $this->db->bind('content', $arr['content'], PDO::PARAM_STR);
        $this->db->bind('idUser', $arr['idUser'], PDO::PARAM_STR);
        $this->db->bind('date', $arr['date'], PDO::PARAM_STR);


        $res = $this->db->execute();

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function showDetail($id)
    {
        $this->db->query(
            'SELECT posts.*, users.nom 
            FROM posts 
            INNER JOIN users
            ON posts.idUser = users.id
            WHERE posts.id = :id'
        );
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        //dd($this->db->findOne());
        return $this->db->findOne();
    }

    public function showPostsUsers($id)
    {
        //dd($_SESSION);
        $this->db->query(
            'SELECT * FROM posts
            WHERE idUser = :id'
        );
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        //dd($this->db->findAll());

        return $this->db->findAll();
    }


    public function findPost($id)
    {
        $this->db->query(
            'SELECT * FROM posts WHERE id = :id'
        );
        $this->db->bind(':id', $id, PDO::PARAM_INT);
       //dd($this->db->findOne());
        return $this->db->findOne();
    }

    public function deletePost($id)
    {
        $this->db->query(
            'DELETE FROM posts WHERE id = :id'
        );
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        //dd($this->db->findAll());

        $res = $this->db->execute();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($arr)
    {
        //dd($arr);
        $this->db->query('UPDATE posts SET title = :title, content = :content, idUser = :idUser, date = :date WHERE id = :postId');
    
        $this->db->bind(':title', $arr['title'], PDO::PARAM_STR);
        $this->db->bind(':content', $arr['content'], PDO::PARAM_STR);
        $this->db->bind(':idUser', $arr['idUser'], PDO::PARAM_STR);
        $this->db->bind(':date', $arr['date'], PDO::PARAM_STR);
        $this->db->bind(':postId', $arr['postId'], PDO::PARAM_INT);

        // dd($this->db->bind(':title', $arr['title'], PDO::PARAM_STR),
        // $this->db->bind(':content', $arr['content'], PDO::PARAM_STR),
        // $this->db->bind(':idUser', $arr['idUser'], PDO::PARAM_STR),
        // $this->db->bind(':date', $arr['date'], PDO::PARAM_STR),
        // $this->db->bind(':postId', $arr['postId'], PDO::PARAM_INT));
    
        $res = $this->db->execute();
        //dd($res);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
