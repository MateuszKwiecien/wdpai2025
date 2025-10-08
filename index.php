<?php
 
echo "<h1>Hello students!</h1>";
 
$baseDir = dirname($_SERVER['SCRIPT_NAME']);
$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);
if (strpos($path, $baseDir) === 0) {
    $path = substr($path, strlen($baseDir));
}
$path = trim($path, '/');
 
echo "
<style>
    h1 { color: blue; }
</style>
";
 
switch($path) {
    case 'dashboard':
        include "public/views/dashboard.html";
        break;
    case 'login':
        include "public/views/login.html";
        break;
    case '':
        // Strona główna
        break;
    default:
        include "public/views/404.html";
        break;
}
 
echo "
<script>
    const header = document.querySelector('h1');
    console.log(header);
    header.addEventListener('click', () => {
        alert('You clicked the header!');
    });
</script>
";