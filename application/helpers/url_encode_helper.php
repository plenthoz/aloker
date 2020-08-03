<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('encode_url')){
       function encode_url($string, $key="", $url_safe=TRUE)
       {
        $CI =& get_instance();
        $CI->load->library('encryption');
        $ret = $CI->encryption->encrypt($string);

        if ($url_safe)
        {
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
}

if ( ! function_exists('decode_url')){
       function decode_url($string, $key="")
       {
        $CI =& get_instance();
        $CI->load->library('encryption');
        $string = strtr(
            $string,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );

        return $CI->encryption->decrypt($string);
    }   
}