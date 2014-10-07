<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 7/10/14
 * Time: 11:04 PM
 */

require 'Secret.php';
require_once 'Blog.php';

function retrieveBlogPost($id)
{
    try {
        $dbh = new PDO(constant('BLOG_DB'), constant('BLOG_USR_READ'), constant('BLOG_USR_READ_PW'));

        $query = $dbh->prepare("SELECT * FROM BlogContents WHERE id=:pID");
        if ($query === false)
        {
            echo 'Error preparing statement!';
            return false;
        }

        $query->bindValue('pID', $id, PDO::PARAM_INT);
        if (!$query->execute())
        {
            var_export($query->errorInfo());
            return false;
        }

        $res = $query->fetch(PDO::FETCH_ASSOC);

        if (empty($res))
        {
            return false;
        }

        $blog = new Blog();
        $blog->id = $res['id'];
        $blog->title = $res['title'];
        $blog->subtitle = $res['subtitle'];
        $blog->desc = $res['description'];
        $blog->created = $res['created'];
        $blog->updated = $res['lastupdate'];
        $blog->tags = $res['tags'];
        $blog->link = $res['content'];

        return $blog;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function retrieveLatestPosts($count)
{
    try {
        $dbh = new PDO(constant('BLOG_DB'), constant('BLOG_USR_READ'), constant('BLOG_USR_READ_PW'));

        $query = $dbh->prepare('SELECT id, title, subtitle, description, tags FROM BlogContents ORDER BY id DESC LIMIT 5');
        if ($query === false || !$query->execute())
        {
            return false;
        }

        $blogs = array();

        $res = $query->fetch(PDO::FETCH_ASSOC);

        while (!empty($res))
        {
            $blog = new Blog();
            $blog->id = $res['id'];
            $blog->title = $res['title'];
            $blog->subtitle = $res['subtitle'];
            $blog->desc = $res['description'];
            $blog->tags = $res['tags'];

            $blogs[] = $blog;

            $res = $query->fetch(PDO::FETCH_ASSOC);// fetchAll
        }

        return $blogs;
    } catch (PDOException $e) {
        return false;
    }
}