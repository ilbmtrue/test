<?php

namespace Sol3;

/**
 * Class Article
 * @package Sol3
 */
class Article implements EntityInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Author
     */
    private $author;

    /**
     * @var string
     */
    public $text;   

    /**
     * @param int $article_id
     * @return Article
     */
    public static function get(int $article_id): self 
    {

    }

    /**
     * возможность получить автора статьи
     * 
     * @return Author
     */
    public function getAuthor(): Author {}

    /**
     * возможность сменить автора статьи
     * 
     * @param Author $author
     * @return bool
     */
    public function changeAuthor(Author $author): bool 
    {

    }
}