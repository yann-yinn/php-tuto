<?php
// security function
function escape(string $string) {
  return  htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function component(string $templateFile, array $variables) {
  extract($variables);
  ob_start();
  include $templateFile;
  $content = ob_get_contents();   
  ob_end_clean();
  return $content;
}

$routes = array(
  "/" => fn() => component('components/home.php', array('message' => 'homepage')),
  "/hello" => fn() => component("components/hello.php", array('message' => 'hello'))
);

function routerView($routes) {
  $currentUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  return $routes[$currentUrl]();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Exemple</title>
</head>
<body>

<?php echo routerView($routes) ?>

</body>
</html>