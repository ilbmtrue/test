<?php

namespace Sol3;

/**
 * Class Author
 * @package Sol3
 */
class Author implements EntityInterface
{
    /**
     * @var int
     */
    public $id;

    /**
     *
     * @var array
     */
    public $articles = [];


    /**
     * @param int $user_id
     * @return Author
     */
    public static function get(int $user_id): self 
    {

    }

    /**
     * @param int $article_id
     * @return Article
     */
    public function getArticle(int $article_id): Article 
    {

    }

    /**
     * возможность получить все статьи конкретного пользователя;
     * 
     * @return array
     */
    public function getArticles(): array 
    {

    }

    /**
     * возможность для пользователя создать новую статью
     * 
     * @param string $str
     * @return Article
     */
    public function createArticle(string $str): Article 
    {

    }
}
