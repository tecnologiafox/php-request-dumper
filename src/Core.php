<?php

namespace TecnologiaFox\PhpRequestDumper;

class Core
{
    public function dumpRequest()
    {
        $command = $this->makeCurlCommand();
        $filename = "/tmp/curl_" . date("Y-m-d\THis") . "_" . md5($command);
        file_put_contents($filename, $command);
    }

    public function makeCurlCommand()
    {
        $cmd = [];
        $args = [];
        foreach ($_FILES as $filename => $file) {
            $random = md5($filename);
            $encoded = base64_encode(file_get_contents($file['tmp_name']));
            $cmd[] = "(echo \"$encoded\" | base64 -d) > $random";
            $args[] = "-F \"$filename=@$random\"";
        }
        foreach ($_POST as $key => $post) {
            $args[] = "-F \"$key=$post\"";
        }
        $cmd[] = "curl";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args[] = "-X POST";
        }
        $args[] = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $output = implode($cmd, "; ") . " " . implode($args, " ");
        return $output;
    }
}
