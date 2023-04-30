<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
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
    '/thank-you' => 'pages/Frontend/Authentication/thank-you.php',

    '/admin_dashboard' => 'pages/Admin/dashboard.php',
    '/admin_slideshow' => 'pages/Admin/slideshow/slideshow.php',
    '/admin_product' => 'pages/Admin/commerce/product/product.php',
    '/admin_category' => 'pages/Admin/commerce/category/category.php',
    '/admin_order' => 'pages/Admin/commerce/order/order.php',
    '/admin_order_detail' => 'pages/Admin/commerce/order/order-detail.php',
    '/admin_company' => 'pages/Admin/configuration/company/company.php',
    '/admin_user' => 'pages/Admin/configuration/user/user.php',
    '/admin_profile' => 'pages/Admin/configuration/user/user-profile.php',
    '/admin_profile/edit/:id' => 'pages/Admin/profile/profile.php',

    '/login' => 'pages/authentication/login.php',
    '/register' => 'pages/authentication/register.php',
    '/OTPmailer' => 'pages/authentication/OTPmailer.php',
];
function routeToPages($uri, $routes)
{
    include('./DB/auth.php');
    if (array_key_exists($uri, $routes)) {
        // echo substr($uri, 0, strpos($uri, "_")); //==>/admin
        session_start();

        //protected route
        if (substr($uri, 0, strpos($uri, "_")) == "/admin") {
            if (!isLogin()) {
                $uri == "/register" ? $uri = "/register" : $uri = "/login";
                require_once $routes[$uri];
            } else {
                require_once 'components/Admin/head.php';
                require_once $routes[$uri];
                require_once 'components/Admin/foot.php';
            }
        }
        //login once only (if go to login page again it will redirect to homepage)
        else if ($uri == "/login" || $uri == "/register" || $uri == "/OTPmailer")
            !isLogin() ? require_once $routes[$uri] : header("location: {$_SERVER['HTTP_ORIGIN']}/");
        //none protected route 
        else {
            require_once 'components/Frontend/header.php';
            require_once $routes[$uri];
            require_once 'components/Frontend/footer.php';
        }

        // var_dump($_SESSION);
    } else
        abort();

}
function abort($code = 404)
{
    // http_response_code($code);
    require "pages/{$code}/{$code}.php";
    die();
}
routeToPages($uri, $routes);