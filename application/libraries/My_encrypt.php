<?php
defined('BASEPATH') or exit('no direct script access allowed');

class MY_Encrypt
{
    private $encryption;

    function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('encryption');
        $this->encryption = $CI->encryption;
    }

    /**
     * Encodes a string.
     * 
     * @param string $string The string to encrypt.
     * @param string $key[optional] The key to encrypt with.
     * @param bool $url_safe[optional] Specifies whether or not the
     *                returned string should be url-safe.
     * @return string
     */
    function encode($string, $key = "", $url_safe = TRUE)
    {
        $ret = $this->encryption->encrypt($string, ['key' => $key]);

        if ($key == '') {
                $ret = $this->encryption->encrypt($string);
            }

        if ($url_safe) {
                $ret = strtr(
                    $ret,
                    array(
                        '+' => '.',
                        '=' => '-',
                        '/' => '~'
                    )
                );
            }

        return $ret;
    }

    /**
     * Decodes the given string.
     * 
     * @access public
     * @param string $string The encrypted string to decrypt.
     * @param string $key[optional] The key to use for decryption.
     * @return string
     */
    function decode($string, $key = "")
    {
        $string = strtr(
            $string,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );

        if ($key == '') {
                return $this->encryption->decrypt($string);
            }

        return $this->encryption->decrypt($string, ['key' => $key]);
    }
}

