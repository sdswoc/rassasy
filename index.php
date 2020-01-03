<?php
    include_once 'Request.php';
    include_once 'Router.php';
    $router = new Router(new Request);
    $router->get('/', function() {
        include('./html/homepage.html');
    });
    $router->get('/login', function() {
        include('./html/login.html');
    });
    $router->post('/login', function() {
        include('./php/login.php');
    });
    $router->get('/registration', function() {
        include('./html/registration.html');
    });
    $router->get('/registrationcanteen', function() {
        include('./html/registrationcanteen.html');
    });
    $router->post('/registrationcanteen', function() {
        include('./php/registercanteen.php');
    });
    $router->get('/registrationuser', function() {
        include('./html/registrationuser.html');
    });
    $router->post('/registrationuser', function() {
        include('./php/registeruser.php');
    });
    $router->get('/user', function() {
        include('./html/userhomepage.php');
    });
    $router->post('/user', function() {
        include('./php/.php');
    });
?>