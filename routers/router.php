<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// $path;
// switch($uri){
//   case '/admin_': $path = 'pages/Admin/dashboard/dashboard.php'; break;
//   case '/admin_slider': $path = 'pages/Admin/slider/slider.php';break;
//   case '/admin_company': $path = 'pages/Admin/company/company.php';break;
// }
// require $path;
$routes = [
    '/' => 'pages/Frontend/homepage.php',
    '/shop' => 'pages/Frontend/shop.php',
    '/shop/product-detail' => 'pages/Frontend/product-detail.php',
    '/contact-us' => 'pages/Frontend/contact-us.php',
    '/about-us' => 'pages/Frontend/about-us.php',
    '/news' => 'pages/Frontend/news.php',
    '/news/news-detail' => 'pages/Frontend/news-detail.php',
    '/shopping-cart' => 'pages/Frontend/shopping-cart.php',
    '/checkout' => 'pages/Frontend/checkout.php',
    '/my-dashboard' => 'pages/Frontend/Authentication/my-dashboard.php',
    '/my-account' => 'pages/Frontend/Authentication/my-account.php',
    '/my-dashboard/order-detail' => 'pages/Frontend/Authentication/order-detail.php',





    '/admin_dashboard' => 'pages/Admin/dashboard.php',

    '/admin_slideshow' => 'pages/Admin/slideshow/slideshow.php',

    '/admin_product' => 'pages/Admin/commerce/product/product.php',

    '/admin_category' => 'pages/Admin/commerce/category/category.php',

    '/admin_order' => 'pages/Admin/commerce/order/order.php',
    '/admin_order/order-detail' => 'pages/Admin/commerce/order/order-detail.php',

    '/admin_company' => 'pages/Admin/configuration/company/company.php',

    '/admin_user' => 'pages/Admin/configuration/user/user.php',

    '/admin_profile' => 'pages/Admin/profile/profile.php',
    '/admin_profile/edit/:id' => 'pages/Admin/profile/profile.php',

    '/login' => 'pages/authentication/login.php',
    '/register' => 'pages/authentication/register.php',
];
function routeToPages($uri, $routes)
{
    include('./DB/auth.php');
    if (array_key_exists($uri, $routes)) {
        // echo substr($uri, 0, strpos($uri, "_")); //==>/admin
        session_start();
        if(strpos($uri, '/') == 0){
            require 'components/Frontend/header.php';
            require $routes[$uri];
            require 'components/Frontend/footer.php';
        }
        else if ($uri == "/register" || $uri == "/login")
            $uri = '/admin_dashboard';
        else if (substr($uri, 0, strpos($uri, "_")) == "/admin") {
            if (isLogin()) {
                $uri == "/register" ? $uri = "/register" : $uri = "/login";
                require $routes[$uri];
            } else {
                require 'components/Admin/head.php';
                require $routes[$uri];
                require 'components/Admin/foot.php';
            }
        }
        // var_dump($_SESSION);
    } else {
        abort();
    }
}
function abort($code = 404)
{
    // http_response_code($code);
    require "pages/{$code}/{$code}.php";
    die();
}
routeToPages($uri, $routes);