<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

/**
 * Get dependencies
 *
 */
class Helper
{
    /**
     * Calculate resource rating
     * 
     * @param integer $total_voted_users
     * @param integer $total_votes
     * @param integer $max_stars
     * @return integer $rating
     * @return boolean false
     */
    public static function averageRating($total_voted_users, $total_votes, $max_stars = 5)
    {
        if (is_integer($total_voted_users) && is_integer($total_votes) && is_integer($max_stars)) {

            $capacity = $total_voted_users * $max_stars;
            $percentage = $total_votes / $capacity * 100;
            $rating = $percentage * $max_stars / 100;

            return ceil($rating);
        }

        return false;
    }

    /**
     * Escape special characters for a LIKE query.
     *
     * @param string $value
     * @param string $char
     * @return string
     */
    public static function escapeLikeForQuery(string $value, string $char = '\\'): string
    {
        return str_replace(
            [$char, '%', '_'],
            [$char.$char, $char.'%', $char.'_'],
            $value
        );
    }

    /**
     * Send an email to a specified address
     * 
     * @param string $message
     * @return boolean
     */
    public static function sendSimpleMail($message)
    {
        try {

            // Check if folder exists
            if (!file_exists('./../public/storage/mockmail')) {
                mkdir('./../public/storage/mockmail', 0777, true);
            }

            // Write a message to text file
            $filename = "./../public/storage/mockmail/mockmail.txt";
            file_put_contents($filename, "\n".$message, FILE_APPEND | LOCK_EX);

        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }
}