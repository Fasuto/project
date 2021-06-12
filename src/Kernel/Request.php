<?php

declare(strict_types=1);

namespace App\Kernel;


class Request
{

    protected $contentType;
    protected $method;
    protected $url;
    protected $ip;
    protected $parameters;
    protected $files;

    public function __construct()
    {
        $this->contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        $this->method = strtoupper($_SERVER['REQUEST_METHOD']);
        $this->url = $_SERVER['PATH_INFO'] ?? '/';
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->prepareParams();
        $this->prepareFiles();
    }

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return mixed|string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }



    protected  function prepareParams(){

        if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET'){
            $params = $_REQUEST;
        }else{
            if( strtoupper($_SERVER['CONTENT_TYPE']) == 'APPLICATION/JSON' ){
                $params = json_decode(file_get_contents('php://input'), true);
            }else{
                $params = $_POST;
            }
        }

        $this->parameters = filter_var_array($params ?? [], FILTER_SANITIZE_SPECIAL_CHARS);

    }

    protected function prepareFiles(){

        $this->files = filter_var_array($_FILES ?? [], FILTER_SANITIZE_SPECIAL_CHARS);

    }

    public function input($fieldName){

        if( !array_key_exists($fieldName, $this->parameters) ){
            header( "Content-type: ". $this->contentType, true, 422 );
            return ['errors' => "Input '$fieldName' does not exists!."];
        }

        return $this->parameters[$fieldName];

    }

    public function file($fileName){

        if( !array_key_exists($fileName, $this->files) ){
            header( "Content-type: ". $this->contentType, true, 422 );
            return ['errors' => "Input file '$fileName' does not exists!."];
        }

        return $this->files[$fileName];

    }


}











