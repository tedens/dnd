<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 8/30/17
 * Time: 11:08 AM
 */

class levelFinder
{
    public function __construct()
    {
    }

    public function getLevel($exp)
    {
        if ($exp >= 0 && $exp < 300) {
            $lvl = 1;
            $prof = '+2';

        } elseif ($exp >= 300 && $exp < 900) {
            $lvl = 2;
            $prof = '+2';

        } elseif ($exp >= 900 && $exp < 2700) {
            $lvl = 3;
            $prof = '+2';

        } elseif ($exp >= 2700 && $exp < 6500) {
            $lvl = 4;
            $prof = '+2';

        } elseif ($exp >= 6500 && $exp < 14000) {
            $lvl = 5;
            $prof = '+3';

        } elseif ($exp >= 14000 && $exp < 23000) {
            $lvl = 6;
            $prof = '+3';

        } elseif ($exp >= 23000 && $exp < 34000) {
            $lvl = 7;
            $prof = '+3';

        } elseif ($exp >= 34000 && $exp < 48000) {
            $lvl = 8;
            $prof = '+3';

        } elseif ($exp >= 48000 && $exp < 64000) {
            $lvl = 9;
            $prof = '+4';

        } elseif ($exp >= 64000 && $exp < 85000) {
            $lvl = 10;
            $prof = '+4';

        } elseif ($exp >= 85000 && $exp < 100000) {
            $lvl = 11;
            $prof = '+4';

        } elseif ($exp >= 100000 && $exp < 120000) {
            $lvl = 12;
            $prof = '+4';

        } elseif ($exp >= 120000 && $exp < 140000) {
            $lvl = 13;
            $prof = '+5';

        } elseif ($exp >= 140000 && $exp < 165000) {
            $lvl = 14;
            $prof = '+5';

        } elseif ($exp >= 165000 && $exp < 195000) {
            $lvl = 15;
            $prof = '+5';

        } elseif ($exp >= 195000 && $exp < 225000) {
            $lvl = 16;
            $prof = '+5';

        } elseif ($exp >= 225000 && $exp < 265000) {
            $lvl = 17;
            $prof = '+6';

        } elseif ($exp >= 265000 && $exp < 305000) {
            $lvl = 18;
            $prof = '+6';

        } elseif ($exp >= 305000 && $exp < 335000) {
            $lvl = 19;
            $prof = '+6';

        } elseif ($exp >= 335000) {
            $lvl = 20;
            $prof = '+6';
        }
        return array('lvl' => $lvl, 'prof' => $prof);
    }
}