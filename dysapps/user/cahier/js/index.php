<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <title>tester js</title>


    </head>


    <body>

        <div id="myDiv">

            <p>Un peu de texte <a>et un lien</a></p>

        </div>


        <script>

            var div = document.getElementById('myDiv');

            var txt = '';


            if (div.textContent) { // « textContent » existe ? Alors on s'en sert !

                txt = div.textContent;

            } else if (div.innerText) { // « innerText » existe ? Alors on doit être sous IE.

                txt = div.innerText + ' [via Internet Explorer]';

            } else { // Si aucun des deux n'existe, cela est sûrement dû au fait qu'il n'y a pas de texte

                txt = ''; // On met une chaîne de caractères vide

            }


            alert(txt);
        </script>

        <script src="javaS.js"></script>

    </body>
</html>