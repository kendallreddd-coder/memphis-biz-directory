<?php
declare(strict_types=1);

class Router {
    private array $routes = [];
    public function get(string $pattern, callable $handler): void {
        $this->routes['GET'][] = ['pattern' => $pattern, 'handler' => $handler];
    }
    public function dispatch(string $method, string $uri): void {
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';
        foreach ($this->routes[$method] ?? [] as $route) {
            $regex = '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $route['pattern']) . '$#';
            if (preg_match($regex, $path, $matches)) {
                call_user_func($route['handler'], $matches);
                return;
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}
