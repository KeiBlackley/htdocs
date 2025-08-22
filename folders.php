<?php

    function returnFoldersList($folder = "") {
        $dir = realpath(__DIR__ . "/" . $folder);
        $folders = array_filter(scandir($dir), function($item) use ($dir) {
            return is_dir($dir . DIRECTORY_SEPARATOR . $item)
                && $item[0] !== '.'
                && stripos($item, 'Test') !== 0
                && strtolower($item) !== 'assets'
                && strtolower($item) !== 'includes';
        });

        foreach ($folders as $folder) { 
            echo '<li><a href="/' . $folder . '/">' . htmlspecialchars($folder) . '</a></li>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Web Directories </title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/footer.css">
    </head>
    <body>
        <main>
            <section class="cover">
                <div class="cover-content">
                    <h1>Project Folders</h1>
                    <p> View Local Project Directories: </p>
                    
                    <ul class="directories">
                        <?php returnFoldersList(); ?>
                    </ul>
                </div>
                <div class="animated-bg"></div>
            </section>
        </main>
        
        <?php include_once("includes/footer.php"); ?>

    </body>
</html>
