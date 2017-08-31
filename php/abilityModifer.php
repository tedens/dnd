<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 8/30/17
 * Time: 1:05 PM
 */

class abilityModifer
{
    public function __construct()
    {
    }
    public function getAbilityModifer($score)
    {
        if ($score == 1 ) {
            $abm = '-5';
        } elseif ($score >= 2 && $score < 4) {
            $abm = '-4';
        } elseif ($score >= 4 && $score < 6) {
            $abm = '-3';
        } elseif ($score >= 6 && $score < 8) {
            $abm = '-2';
        } elseif ($score >= 8 && $score < 10) {
            $abm = '-1';
        } elseif ($score >= 10 && $score < 12) {
            $abm = '0';
        } elseif ($score >= 12 && $score < 14) {
            $abm = '+1';
        } elseif ($score >= 14 && $score < 16) {
            $abm = '+2';
        } elseif ($score >= 16 && $score < 18) {
            $abm = '+3';
        } elseif ($score >= 18 && $score < 20) {
            $abm = '+4';
        } elseif ($score >= 20 && $score < 22) {
            $abm = '+5';
        } elseif ($score >= 22 && $score < 24) {
            $abm = '+6';
        } elseif ($score >= 24 && $score < 26) {
            $abm = '+7';
        } elseif ($score >= 26 && $score < 28) {
            $abm = '+8';
        } elseif ($score >= 28 && $score < 30) {
            $abm = '+9';
        } elseif ($score >= 30) {
            $abm = '+10';
        }
        return $abm;

    }
}