<?php

/**
 * Created by PhpStorm.
 * User: arka
 * Date: 26.05.2016
 * Time: 9:13
 */
class Comment
{
    public static function add($postId, $name, $email, $text)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO comments (post_id, name, email, text) VALUES (:post_id, :name, :email, :text)";

        $result = $db->prepare($sql);
        $result->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getCommentsByPostId($postId)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM comments WHERE post_id = :post_id ORDER BY date_added ASC";

        $result = $db->prepare($sql);
        $result->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $comments = false;
        $i = 0;
        while ($row = $result->fetch()) {
            $comments[$i]['id'] = $row['id'];
            $comments[$i]['name'] = $row['name'];
            $comments[$i]['email'] = $row['email'];
            $comments[$i]['text'] = $row['text'];
            $i++;
        }
        return $comments;
    }

    public static function checkText($text)
    {
        if (strlen($text) >= 2) {
            return true;
        } else {
            return false;
        }
    }
}