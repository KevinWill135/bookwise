<?php
function views($view, $data = [])
{
        foreach ($data as $key => $value) {
                $$key = $value;
        }

        require('views/template/app.php');
}

function dd(...$dump)
{
        echo '<pre>';

        var_dump($dump);

        echo '</pre>';

        die();
}

function abort($code)
{
        http_response_code($code);
        views($code);
        die();
}

function flash()
{
        return new Flash;
}

function config($chave = null)
{
        $config = require "config.php";

        if (strlen($chave) > 0) {
                return $config[$chave];
        }

        return $config;
}

function auth()
{
        if (!isset($_SESSION['auth'])) {
                return null;
        }

        return $_SESSION['auth'];
}
