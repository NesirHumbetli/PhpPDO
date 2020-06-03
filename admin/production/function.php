<?php 
ob_start();
session_start();

function seo($s)
{
    $az = array('ş', 'Ş', 'ı', 'I', 'İ', 'ğ', 'Ğ', 'ç', 'Ç', 'ü', 'Ü', 'ö', 'Ö', 'ə', 'Ə', '(', ')', '/', ':', ',', '?');
    $eng = array('s', 's', 'i', 'i', 'i', 'g', 'g', 'c', 'c', 'u', 'u', 'o', 'o', 'e', 'e', '', '', '-', '-', '', '');
    $s = str_replace($az, $eng, $s);
    $s = strtolower($s);
    $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.=?;/', '', $s);
    $s = preg_replace('/\s+/', '-',$s);
    $s = preg_replace('|-+|','-',$s);
    $s = preg_replace('/#/','',$s);
    $s = str_replace('_','',$s);
    $s = trim($s,'-');
    return $s;
}

function tcevir($tarix) {
    $az = explode("-",$tarix);
    $tarix1 = $az[2]."-".$az[1]."-".$az[0];
    return $tarix1;
}



?>