<?php

/*
* Transforme du BBCODE en html
* @param $text le texte a transformer
* @param $optimized le texte doit t'il être optimiser pour le référencement
* @return le texte convertir en HTML
*/

if(!function_exists('bbcode_to_html'))
{
  function bbcode_to_html($text, $optimized = false)
  {


    $text = stripcslashes($text);
    $text = str_replace("\r\n", "\n", $text);
    $text = str_replace("\r", "\n", $text);
    // Gestion des paragraphe et retour a la ligne
    $text = str_replace("\n\n", "</p><p>", $text);
    $text = str_replace("\n", "<br>", $text);

    // Gestion des titre
    $text = preg_replace('#\[title\](.+)\[/title]#isU', '<h2>$1</h2>', $text);
    $text = preg_replace('#\[subtitle\](.+)\[/subtitle]#isU', '<h3>$1</h3>', $text);

    // Gestion du formatage
    $text = preg_replace('#\[b](.+)\[/b]#isU', '<strong>$1</strong>', $text);
    $text = preg_replace('#\[i](.+)\[/i]#isU', '<em>$1</em>', $text);
    $text = preg_replace('#\[u](.+)\[/u]#isU', '<ins>$1</ins>', $text);
    $text = preg_replace('#\[s](.+)\[/s]#isU', '<del>$1</del>', $text);
    $text = preg_replace('#\[m](.+)\[/m]#isU', '<mark>$1</mark>', $text);
    $text = preg_replace('#\[quote\](.+)\[/quote\]#', '<blockquote class="bbcode-blockquote">$1</blockquote>', $text);
    $text = preg_replace('#\[cite\](.+)\[/cite\]#', '<cite>$1</cite>', $text);
    $text = preg_replace('#\[code\](.+)\[/code\]#iuS', '<pre class="bbcode-code">$1</pre>', $text);
    $text = preg_replace('#\#include <(.+)>#', "&#60$1&#62", $text);

    //Gestion des élément
    $text = preg_replace('#\[left](.+)\[/left]#isU', '<p class="bbcode-left">$1</p>', $text);
    $text = preg_replace('#\[justify](.+)\[/justify]#isU', '<p class="bbcode-justify">$1</p>', $text);
    $text = preg_replace('#\[center](.+)\[/center]#isU', '<p class="bbcode-center">$1</p>', $text);
    $text = preg_replace('#\[right](.+)\[/right]#isU', '<p class="bbcode-right">$1</p>', $text);

    //Gestion des média url
    $text = preg_replace('#\[url=(.+)\](.+)\[/url\]#isU', '<a href="$1" alt="allez vers...">$2</a>', $text);
    $text = preg_replace('#\[url\](.+)\[/url\]#isU', '<a href="$1" alt="allez vers...">$1</a>', $text);
    $text = preg_replace('#\[img\](.+)\[/img\]#i', '<img src="$1" alt="bbcpde-image">', $text);
    $text = preg_replace('#\[youtube\](.+)\[/youtube\]#', '<iframe class="bbcode-iframe" width=640 height=480 src="//www.youtube.com/embed/$1">', $text);

    // Netoyyage texte
    $text = '<p>' . $text . '</p>';
    $text = str_replace('<p><blockquote>', '<blockquote>', $text);
    $text = str_replace('</blockquote></p>', '</blockquote>', $text);
    $text = str_replace('<p><h2>', '<h2>', $text);
    $text = str_replace('</h2></p>', '</h2>', $text);
    $text = str_replace('<p><h3>', '<h3>', $text);
    $text = str_replace('</h3></p>', '</h3>', $text);
    $text = str_replace('<p><p class', '<p class', $text);
    $text = str_replace('</p></p>', '</p>', $text);
    $text = str_replace('<p></p>', '', $text);
    $text = str_replace('</cite></p>', '</cite>', $text);
    $text = str_replace('<p><pre>', '<pre>', $text);
    $text = str_replace('</pre></p>', '</pre>', $text);
    $text = str_replace('<p>    <h2>', '<h2>', $text);
    $text = str_replace('</h2></p>', '</h2>', $text);
    $text = str_replace(';</p>', ';', $text);

    return $text;
  }
}
?>
