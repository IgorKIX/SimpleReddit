<?php
    function getAllComments() {
        global $dbh;
        $stmt = $dbh->prepare("SELECT *
                               FROM comments JOIN
                                    stories USING (id_story)
                               ORDER BY id_comment DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    function getAllCommentsByIdStory($id_story) {
        global $dbh;
        $stmt = $dbh->prepare("SELECT *
                               FROM comments 
                               WHERE id_story = ?");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getCommentById($id_story, $id_comment) {
        global $dbh;
        $stmt = $dbh->prepare("SELECT *
                               FROM comments JOIN
                                    stories USING (id_story)
                               WHERE id_story = $id_story
                               AND id_comment = $id_comment");
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    function insertComment($id_comment, $id_story, $username, $date, $text) {
        global $dbh;
        $stmt = $dbh->prepare("INSERT INTO comments VALUES (?,?,?,?,?,?);");
        $stmt->execute(array($id_comment, $id_story, $username, $date, $text, NULL));
    }

?>