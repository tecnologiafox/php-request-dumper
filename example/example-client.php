<?php

require "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dumper = new \TecnologiaFox\PhpRequestDumper\PhpRequestDumper();
    $dumper->getCore()->dumpRequest();
} else {
    echo <<<MYSTRING
    <html>
        <form method="post" enctype="multipart/form-data">
            <input name="arquivo" type="file"/>
            <input type="submit">
        </form>
    </html>
MYSTRING;
}
