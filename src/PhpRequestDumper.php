<?php

namespace TecnologiaFox\PhpRequestDumper;

class PhpRequestDumper
{
    public function __construct()
    {
        $containerBuilder = new \DI\ContainerBuilder();
        $container = $containerBuilder->build();
        $this->container = $container;
    }

    public function getCore()
    {
        return $this->container->get(Core::class);
    }
}
