<?php

namespace App\Core;

class Router
{
    private function parseRequest(string $request)
    {
        $route = [];
        $routeData = explode('/', $request);
        $route['path'] = '/'.explode('?', $routeData[1])[0];
        $route['parameter'] = $routeData[2] ?? null;
        return $route;
    }

    public function route(array $routes, string $request, array $availableDependencies = [])
    {
        $requestData = $this->parseRequest($request);
        $routeFound = false;

        foreach ($routes as $route) {
            if ($route['path'] === $requestData['path']) {
                $routeFound = true;

                if ($route['isLogged'] && !isset($_SESSION['idUser'])) {
                    header('Location: /');
                    exit;
                }

                if (isset($route['isLoggedAdmin']) && $route['isLoggedAdmin'] && !isset($_SESSION['idUserAdmin'])) {
                    header('Location: /');
                    exit;
                }

                $controllerClass = $route['controller'];
                $method = $route['method'];

                $dependencies = [];
                if (!empty($route['dependencies'])) {
                    foreach ($route['dependencies'] as $depName) {
                        if (isset($availableDependencies[$depName])) {
                            $dependencies[] = $availableDependencies[$depName];
                        } else {
                            throw new \Exception("Dépendance '$depName' non fournie");
                        }
                    }
                }

                $ctrl = new $controllerClass(...$dependencies);

                if ($route['parameter'] && $requestData['parameter'] !== null) {
                    $ctrl->$method($requestData['parameter']);
                } else {
                    $ctrl->$method();
                }

                break;
            }
        }

        if (!$routeFound) {
            throw new \Exception('Route not found', 404);
        }
    }
}


?>