<?php
    define('PICS_DIRECTORY_RELATIVE_LOCATION', 'pics');

    function display_character(string $character, string $size) : string
    {
        $html = '<div class="character '.$size.'">';
        $html .= '<div class="pic" style="background-image:url(\''.PICS_DIRECTORY_RELATIVE_LOCATION.'/'.$character.'\');"></div>';
        $html .= '<div class="name">'.str_replace('.png', '', $character).'</div>';
        $html .= '</div>';

        return $html;
    }

    function get_characters() : array
    {
        $source = dirname(__FILE__).'/'.PICS_DIRECTORY_RELATIVE_LOCATION;

        if (!$all_files = scandir($source)) {
            return [];
        }

        return filter_characters($all_files);
    }

    function filter_characters(array $all_files) : array
    {
        return array_filter($all_files, function($file_name) {
            return stristr($file_name, 'png');
        });
    }
