<?php
use Yaf\Dispatcher;
use Yaf\Registry;
use Yaf\Route\Simple;
class Bootstrap extends Yaf\Bootstrap_Abstract{

    public $config;
    public $loader;

    /**
     * [_initConfig init yaf config]
     * @return [type] [description]
     */
    public function _initConfig() {
        $this->config = Yaf\Application::app()->getConfig();
        Yaf\Registry::set("config", $this->config);

         //申明, 凡是以Foo和Local开头的类, 都是本地类
        $this->loader = Yaf\Loader::getInstance();
        $this->loader->registerLocalNamespace(["fly"]);
    }

    //test init
    // public function _initSaonek(Yaf_Dispatcher $dispatcher){
    // 	var_dump($dispatcher->returnResponse());
    // }

    /**
     * [_initLoader loadSB]
     * @return [type] [void]
     */
    public function _initLoader(){
        //$this->loader->import("db/Medoo.php");
        $this->loader->autoload("fly_db_Medoo");
       // print_r($this->loader);

    }

    /**
     * [_initRoute Config routes]
     * @param  Yaf_Dispatcher $dispatcher [default]
     * @return [type]                     [description]
     */
    public function _initRoute(Dispatcher $dispatcher) {
        $router = Dispatcher::getInstance()->getRouter();
        /**
         * 添加配置中的路由//
         */
       // $router->addConfig(Registry::get("config")->routes);
        $route = new Simple("m", "c", "a");
        $router->addRoute("name", $route);
    }
}