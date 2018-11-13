<?php

require "vendor" . DIRETORY_SEPARATOR . "autoload.php";

$dumper = new \TecnologiaFox\PhpRequestDumper\PhpRequestDumper();
$dumper->getCore()->dumpRequest();
