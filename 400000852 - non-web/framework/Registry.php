<?php 
class Registry 
{
    private static $instance = null;
    private $session;
    private $validator;
    private $config;

    public static function instance(): self
    {
        if (is_null (self::$instance)){
        self::$instance = new self();
    }
        return self::$instance;
    }
    public function getSession (): Session
    {
        if (is_null ($this->session)){
            $this->session = new Session();
        }
        return $this->session;
    }

    public function getValidator(){
        if (is_null($this->validator)){
            $this->session = new Validator();
        }
        return $this->validator;
    }

    public function getConfiguration (): Configurator{
        if(is_null ($this->config)){
            $this->config = new Configurator(); 
        }
        return $this->config;
    }
}