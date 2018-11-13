<?php

namespace TecnologiaFox\PhpRequestDumper;

class PhpRequestDumper
{
    public function __construct()
    {
        $containerBuilder = new \DI\ContainerBuilder();
        $containerBuilder->useAnnotations(true);
        $container = $containerBuilder->build();
        $this->container = $container;
    }

    public function getCore()
    {
        $this->container->get(Core::class);
    }
}
