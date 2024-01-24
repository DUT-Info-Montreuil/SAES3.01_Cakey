<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="script.js"></script>
       <title><?= $pageTitle ?></title>
    </head>
    <body>
        <header>
            <?php
                $compMenu = new ControllerCompMenu(new VueCompMenu);
                $compMenu->exec();
            ?>
        </header>
        <div class="imagedefond">
            <main>
                <?= $tampon ?>
            </main>
        </div>
        <footer>
            <?php
                $compFooter = new ControllerCompFooter(new VueCompFooter);
                $compFooter->exec();
            ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
