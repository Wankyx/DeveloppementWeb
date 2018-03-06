<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>PARSEUR DE BBCODE PHP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bbcode.css">
  </head>

  <body>
    <h1>Tutoriel parseur BBCODE</h1>

    <?php
    include 'bbcode.php';

    $content = 'Ceci est un premier paragraphe, et le début de mon contenu,

    Ici je commence un nouveau paragraphe avec [b]du texte en gras[/b].
    Je peu aussi mettre en avant le texte avec un [i]rendu en italique[/i], ou bien [u]le souligner[/u].

    [title]Mon titre principale[/title]

    [quote]Il etais une fois...[/quote]
    [cite]Ceci est une citation courte[/cite]

    [code]
    #include &#60;stdio.h&#62;
    #include &#60;stdlib.h&#62;

    int main(void)
    {
      printf("Hello, World !");

      return EXIT_SUCCESS;
    }
    [/code]

    [center]Ceci est du texte centré également dans un nouveau paragraphe.[/center]

    [right]Moi je suis du texte aligné a droite et avec du [s]contenu barré[/s] mais aussi [m]un passage mis en évidence[/m][/right]

    Je continue un nouveau paragraphe, sans fioritures
    [subtitle]Mon deuxiemme et dernier sous titre[/subtitle]
    Mon texte justifier
    [justify]aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa[/justify]

    [center][img]picture.jpg[/img][/center]
    [left]voilla mon image est bien centré[/left]

    voilà, mon image a bien été incluse.
    La je viens de sauter a nouveau a la ligne, et passons à une vidéo de YouTube :

    [center][youtube]bryUQiW4IVU[/youtube][/center]

    Et on termine avec un lien avec ma chaine [url=https://secure.fnac.com/MyAccount/Order]CLIQUE ICI[/url]
    [url]http://wwww.google.fr[/url]
    ';

    echo bbcode_to_html($content);

    ?>

  </body>
</html>
