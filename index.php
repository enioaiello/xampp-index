<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            scroll-behavior: smooth;
            transition: 200ms ease-in-out;
        }

        body {
            width: 95%;
            margin: 0 auto;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        #projects h1 {
            margin: 2vh 0;
            text-align: left;
        }

        .button {
            display: inline-block;
            width: 100%;
            text-align: center;
            padding: 2% 5%;
            margin: 0.5vh 0;
            background-color: #40798c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            outline: none;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #40798caa;
            color: white;
            text-decoration: none;
        }

        .button.denied {
            background-color: gray;
            cursor: not-allowed;
        }

        .button.semi {
            width: 49%;
        }

        .articleContain {
            display: flex;
            flex-direction: row;
            width: 100%;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        article {
            width: 49%;
            height: auto;
            display: flex;
            flex-direction: column;
            background-color: lightgray;
            border-radius: 5px;
            padding: 1%;
            margin: 1% 0;
            overflow: hidden;
            height: fit-content;
        }

        .banner {
            width: 100%;
            height: 150px;
            border-radius: 5px;
            margin-bottom: 10px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        article * {
            margin: 0.25vh 0;
        }

        article:hover {
            transform: scale(1.025);
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        #content h2,
        #content h3,
        #content p,
        #content .button {
            margin: 0;
        }

        article>.buttons {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .no-projects {
            text-align: center;
            font-size: 1.2em;
            color: gray;
            margin-top: 20px;
        }

        #links {
            display: inline-flex;
            position: fixed;
            right: 5vw;
            padding: 0.5%;
            width: 7.5vw;
            height: auto;
            top: 50%;
            transform: translateY(-50%);
            align-items: center;
            list-style: none;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        #links li {
            width: 100%;
        }

        #links:hover {
            background-color: rgba(255, 255, 255, 0.35);
        }

        #links li img {
            width: 100%;
        }

        @media (prefers-color-scheme: dark) {
            ::selection {
                background-color: #ffffff;
                color: #000000;
            }

            header, footer {
                background-color: #000000;
            }

            header nav ul li a {
                text-decoration: none;
                color: #ffffff;
            }

            body {
                background-color: #000000;
                color: #ffffff;
            }

            article {
                background-color: #505050b2;
            }
        }
    </style>
</head>
    <div id="projects">
        <h1>Projets</h1>
        <div class="articleContain">
            <?php
            // Spécifie le chemin racine (le dossier htdocs ou un autre chemin spécifique)
            $root = __DIR__;

            // Variable pour compter les projets
            $projectCount = 0;

            // Parcourt tous les éléments du dossier racine
            foreach (new DirectoryIterator($root) as $fileInfo) {
                // Vérifie si c'est un dossier (et ignore les . et ..)
                if ($fileInfo->isDir() && !$fileInfo->isDot()) {
                    // Crée le lien vers le dossier
                    $folderName = $fileInfo->getFilename();
                    $folderUrl = './' . urlencode($folderName);
                    $folderBanner = file_exists("./" . urlencode($folderName) . "/assets/img/banner.png") ? "./" . urlencode($folderName) . "/assets/img/banner.png" : 'https://images.crazygames.com/games/chrome-dino/cover-1669113832091.png?auto=format,compress&q=75&cs=strip';

                    // Affiche chaque dossier dans un <article> à l'intérieur de la div .articleContain
                    echo '<article>';
                    echo '<div class="banner" style="background-image: url(' . htmlspecialchars($folderBanner) . ');"></div>';
                    echo '<h2>' . htmlspecialchars($folderName) . '</h2>';
                    echo '<p>Répétoire : ' . htmlspecialchars($folderName) . '</p>';
                    // Ajout d'un lien (bouton) vers le projet
                    echo '<a class="button" href="' . htmlspecialchars($folderUrl) . '">Ouvrir le projet</a>';
                    echo '</article>';

                    // Incrémenter le compteur de projets
                    $projectCount++;
                }
            }

            // Si aucun projet n'a été trouvé
            if ($projectCount === 0) {
                echo '<p class="no-projects">Aucun projet n\'a été détecté.</p>';
            }
            ?>
        </div>
    </div>
    <ul id="links">
        <li>
            <a href="http://localhost/phpmyadmin"><img src="https://www.softaculous.com/images//ampps/appimages/phpmyadmin.png" alt="PhpMyAdmin" title="Accéder à PhpMyAdmin"></a>
        </li>
    </ul>
</body>
</html>
