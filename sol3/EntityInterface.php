<?php

namespace Sol3;

/**
 * Interface EntityInterface
 * @package Sol3
 */
interface EntityInterface
{
    /**
     * @param int $id
     * @return EntityInterface
     */
    public static function get(int $id);
}