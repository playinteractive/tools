<?php
/**
 * @author    Playinteractive <tools.github@playinteractive.com>
 * @link      http://www.playinteractive.com
 * @copyright 2017 Playinteractive
 */

namespace Functions;

class Tool {

    # HTTPS

    public static function https() {

        if (isset($_SERVER['REQUEST_SCHEME']) AND strtolower($_SERVER['REQUEST_SCHEME']) === 'https') return TRUE;

        if (isset($_SERVER['HTTPS']) AND (strtolower($_SERVER['HTTPS']) === 'on' OR $_SERVER['HTTPS'] === 1)) return TRUE;

        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) AND strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https') return TRUE;

        if (isset($_SERVER['HTTP_FRONT_END_HTTPS']) AND (strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) === 'on' OR $_SERVER['HTTP_FRONT_END_HTTPS'] === 1)) return TRUE;

        else return FALSE;
    }

    # REPLACE STRING

    public static function replaceString($string, $separator = FALSE, $allow = FALSE) {

        $search = array('ª', 'à', 'á', 'ä', 'â', 'ã', 'å', 'ā', 'ą', 'Ą', 'Ā', 'À', 'Á', 'Â', 'Ä', 'Ã', 'Å', 'ć', 'č', 'ç', 'Č', 'Ç', 'Ć', 'é', 'è', 'ë', 'ê', 'ē', 'ĕ', 'ė', 'ę', 'ě', 'Ē', 'Ĕ', 'Ė', 'Ę', 'Ě', 'É', 'È', 'Ë', 'Ê', 'ƒ', 'Ğ', 'Ģ', 'ğ', 'ģ', 'į', 'ī', 'í', 'ì', 'ï', 'î', 'Ī', 'Į', 'İ', 'Í', 'Ì', 'Ï', 'Î', 'Ķ', 'ķ', 'Ĺ', 'Ļ', 'ĺ', 'ļ', 'Ń', 'Ņ', 'Ň', 'Ñ', 'ń', 'ņ', 'ň', 'ñ', 'º', 'ó', 'ò', 'ö', 'ô', 'õ', 'ø', 'Ó', 'Ò', 'Ö', 'Ô', 'Õ', 'Ø', 'Ř', 'ř', 'Ś', 'Ş', 'Š', 'ś', 'ş', 'š', 'Ť', 'ť', 'ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Ü', 'Û', 'Ū', 'Ů', 'Ų', 'ū', 'ů', 'ų', 'Ý', 'Ÿ', 'ý', 'ÿ', 'Ź', 'Ż', 'Ž', 'ż', 'ź', 'ž', '&#039;', '&amp;', '&quot;', '&lt;', '&gt;');
        $replace = array('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'c', 'c', 'C', 'C', 'C', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'f', 'G', 'G', 'g', 'g', 'i', 'i', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'K', 'k', 'L', 'L', 'l', 'l', 'N', 'N', 'N', 'N', 'n', 'n', 'n', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'O', 'R', 'r', 'S', 'S', 'S', 's', 's', 's', 'T', 't', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'u', 'u', 'u', 'Y', 'Y', 'y', 'y', 'Z', 'Z', 'Z', 'z', 'z', 'z', '\'', '&', '"', '<', '>');

        return str_replace(' ', $separator, trim(preg_replace('/\s\s+/', ' ', preg_replace('/[^a-zA-Z0-9' . $allow . ']/', ' ', str_replace($search, $replace, $string)))));
    }

    # SHUTDOWN
    
    public static function shutdown() {

        if (defined('PERFORMANCE')) print_r(array(['memory_final' => number_format(memory_get_usage()), 'memory_initial' => number_format(PERFORMANCE['memory']), 'memory_peak' => number_format(memory_get_peak_usage()), 'time' => number_format((microtime(TRUE) - PERFORMANCE['time']), 3)]));
    }

    # STATUS CODE
    
    public static function statusCode($code, $ERROR = TRUE) {

        if ($code == 200):

        header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK');
        header('Status: 200 OK');

        $_SERVER['REDIRECT_STATUS'] = 200;

        http_response_code(200);

        elseif ($code == 201):

        header($_SERVER['SERVER_PROTOCOL'] . ' 201 Created');
        header('Status: 201 OK');

        $_SERVER['REDIRECT_STATUS'] = 201;

        http_response_code(201);

        elseif ($code == 201):

        header($_SERVER['SERVER_PROTOCOL'] . ' 202 Accepted');
        header('Status: 202 OK');

        $_SERVER['REDIRECT_STATUS'] = 202;

        http_response_code(202);

        elseif ($code == 400):

        header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request');
        header('Status: 400 OK');

        $_SERVER['REDIRECT_STATUS'] = 400;

        http_response_code(400);

        elseif ($code == 401):

        header($_SERVER['SERVER_PROTOCOL'] . ' 401 Unauthorized');
        header('Status: 401 OK');

        $_SERVER['REDIRECT_STATUS'] = 401;

        http_response_code(401);

        elseif ($code == 403):

        header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbbiden');
        header('Status: 403 Forbbiden');

        $_SERVER['REDIRECT_STATUS'] = 403;

        http_response_code(403);

        elseif ($code == 404):

        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        header('Status: 404 Not Found');

        $_SERVER['REDIRECT_STATUS'] = 404;

        http_response_code(404);

        elseif ($code == 503):

        header($_SERVER['SERVER_PROTOCOL'] . ' 503 Service Unavailable');
        header('Status: 503 Service Unavailable');
        header('Retry-After: 3600');

        $_SERVER['REDIRECT_STATUS'] = 503;

        http_response_code(503);

        else:

        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        header('Status: 500 Internal Server Error');

        $_SERVER['REDIRECT_STATUS'] = 500;

        http_response_code(500);

        endif;

        if ($ERROR) return $ERROR = http_response_code();
    }

    # VALIDATE STRING

    public static function validateString($string, $db = FALSE) {

        return $db ? $db->real_escape_string(trim(strip_tags($string))) : trim(strip_tags($string));
    }

    # VALIDATE TEXT

    public static function validateText($text, $db = FALSE, $tag = FALSE, $textarea = FALSE) {

        $text = preg_replace('/\"([^<>]*?)\"(?=(?:[^>]*?(?:<|$)))/', '“\1”', str_replace(array('`', '´'), array('‘', '’'), $textarea ? $text : trim(preg_replace(array('@([\r\n])[\s]+@', '@&(nbsp|#160);@i', '/\s\s+/u'), ' ', $text))));

        $dom = new DOMDocument;
                
        @$dom->loadHTML(mb_convert_encoding($text, 'HTML-ENTITIES'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        foreach ($dom->getElementsByTagName('a') as $node) {

            if (!$node->getAttribute('title')) $node->setAttribute('title', $node->getAttribute('href'));

            if ($node->getAttribute('target') == '_blank') {

                $node->removeAttribute('target');
                $node->setAttribute('class', 'external');
            }

            if (stripos($node->getAttribute('href'), 'mailto:') === 0) {

                $node->removeAttribute('target');
                $node->removeAttribute('class');
            }

            if (!(substr($node->getAttribute('href'), 0, 2) == '[[' AND substr($node->getAttribute('href'), -2) == ']]')) if (!parse_url($node->getAttribute('href'), PHP_URL_SCHEME)) $node->setAttribute('href', 'http://' . $node->getAttribute('href'));
        }

        return $db ? $db->real_escape_string(html_entity_decode(urldecode(trim(strip_tags($dom->saveXML(), $tag))))) : html_entity_decode(urldecode(trim(strip_tags($dom->saveXML(), $tag))));
    }
}
