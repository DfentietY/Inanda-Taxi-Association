<?php 
    function call($controller, $action) {
        require_once('controller/'.$controller.'_controller.php');
        switch($controller) {
            case 'main' :
                $controller = new MainController();
                require_once('model/main.php');
              break;
            case 'admin' :
                $controller = new AdminController();
              break;
            case 'taxiowner' :
                $controller = new TaxiOwnerController();
              break;
            default:
                //cdisplay error page
            break;
        }

        require_once('model/taxiowner.php');
        require_once('model/taxi.php');
        require_once('model/driver.php');
        
        session_start();
        $controller->{ $action }();
    }

    $controllers = array('main' => array('login', 'register'),
                        'admin' => array(),
                        'taxiowner' => array());

    if(array_key_exists($controller, $controllers)) {
        if(in_array($action, $controllers[$controller])){
            call($controller, $action); 
        }else {
            //Call error page 951
        }
    }else {
        //Call error page 404
    }
?>