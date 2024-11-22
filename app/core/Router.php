<?php

class Router
{
    private static $routes = [];
    private $params = [];

    /**
     * Adds a route to the routing table
     *
     * @param string $route The URL pattern for the route
     * @param array $params Parameters associated with the route, such as controller and action
     */
    public static function add($route, $params = [])
    {
        self::$routes[$route] = $params;
    }

    /**
     * Matches a URL to a route in the routing table
     *
     * @param string $url The URL to match against the routes
     * @return bool True if a match is found, false otherwise
     */
    private function match($url)
    {
        foreach (self::$routes as $route => $params) {
            if (preg_match("~$route~", $url, $matches)) {
                $this->params = $params;
                if (!empty($matches[1])) {
                    $this->params['id'] = $matches[1];
                }
                return true;
            }
        }
        return false;
    }

    /**
     * Dispatches the request to the appropriate controller and action
     *
     * @param string $url The URL to dispatch
     */
    public function dispatch($url)
    {
        $url = trim($url, '/');

        if ($this->match($url)) {
            $controller = $this->params['controller'] . 'Controller';

            if (class_exists($controller)) {
                $controllerObject = new $controller();
                $action = $this->params['action'];

                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action($this->params);
                } else {
                    echo "Method $action not found!";
                }
            } else {
                echo "Controller $controller not found!";
            }
        } else {
            http_response_code(404);
            echo "Page not found!";
        }
    }
}
