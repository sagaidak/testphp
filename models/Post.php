<?php

/**
 * Created by PhpStorm.
 * User: arka
 * Date: 26.05.2016
 * Time: 5:51
 */
class Post
{
    public static function addPost($userId, $status, $title, $full)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO posts (user_id, status, title, full) VALUES (:user_id, :status, :title, :full)";

        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':full', $full, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function updatePost($id, $status, $title, $full)
    {
        $db = Db::getConnection();
        $sql = "UPDATE posts SET status = :status, title = :title, full = :full WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':full', $full, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function deletePost($id)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM posts WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getPostsByUserId($userId)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM posts WHERE user_id = :userId";

        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {
            $posts[$i]['id'] = $row['id'];
            $posts[$i]['title'] = $row['title'];
            $posts[$i]['status'] = $row['status'];
            $posts[$i]['full'] = $row['full'];
            $i++;
        }
        return $posts;
    }

    public static function getPosts()
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM posts WHERE status = 1 ORDER BY date_added DESC";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $posts[$i]['id'] = $row['id'];
            $posts[$i]['user_id'] = $row['user_id'];
            $posts[$i]['title'] = $row['title'];
            $posts[$i]['full'] = $row['full'];
            $i++;
        }
        return $posts;
    }

    public static function getPostById($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM posts WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }
}