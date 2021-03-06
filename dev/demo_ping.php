<?php

    /**
     * Minimal class autoloader
     *
     * @param string $class Full qualified name of the class
     */
    function miniAutoloader($class)
    {
        require __DIR__ . '/../src/' . $class . '.php';
    }

    spl_autoload_register('miniAutoloader');

    $deepLy = new ChrisKonnertz\DeepLy\DeepLy();

    $simple = (isset($_GET['simple']) and $_GET['simple'] == 1);

    try {
        $ping = $deepLy->ping();

        if ($simple) {
            echo '1';
        } else {
            echo 'Ping successful. Duration: ' . $ping . ' seconds';
        }
    } catch (\Exception $exception) {
        if ($simple) {
            echo '0';
        } else {
            echo 'Ping not successful. Could not reach API.';
        }
    }