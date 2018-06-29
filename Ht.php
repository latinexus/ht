<?php
/**
 * Creator: Eric Larrea
 * E-mail: eric@latinexus.net
 * From: latinexus.net
 * Date: 6/29/2018
 * Time: 1:00 PM
 */
namespace Html;


class Ht
{
    /**
     * @var int  Auto ID que se generará enc aso de no aparecer la propiedad "id" en la etiqueta
     */
    private static $autoId = 0;

    /**
     * Para las etiquetas de que abren y cierran (<a></a>, <div></div>, <p></p>, etc)
     */
    public static function blk($contenido = "", array $opt = [], $envoltura = "div")
    {
        $params = self::params($opt);
        return "<" . $envoltura . " " . $params . ">" . $contenido . "</" . $envoltura . ">";
    }

    /**
     * Para las etiquetas de autocierre (<input />, <img />, <hr />, <br />, etc...)
     * @param array $opt
     * @param string $envoltura
     * @return string
     */
    public static function noBlk(array $opt = [], $envoltura = "input")
    {
        $params = self::params($opt);
        return "<" . $envoltura . " " . $params . " />";//.PHP_EOL
    }

    /**
     *  parámetros que se le pasarán a la etiqueta ()
     * @param $opt
     * @return string
     */
    public static function params($opt)
    {
        if (!empty($opt)) {
            foreach ($opt as $opId => $op) {
                if (strtolower($opId) == "id") {
                    $blk["id"] = !empty($op) ? 'id = "' . $op . '"' : 'id = "id_' . self::$autoId++ . '"';
                } else {
                    $blk[$opId] = !empty($op) ? $opId . ' = "' . $op . '"' : "";
                }
            }
            if (!isset($blk["id"])) {
                $blk["id"] = 'id = "id_' . self::$autoId++ . '"';
            }

            $optRetorno = implode(" ", $blk);
        } else {
            $optRetorno = "";
        }

        return $optRetorno;
    }

}

