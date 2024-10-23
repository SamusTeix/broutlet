<?php
namespace App\Middleware;

use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Cake\Routing\Router;

class LoginMiddleware
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next): ResponseInterface
    {
        // Verifica se o usuário está logado
        if (!in_array($request->here, ['/login', '/logout']) && !$this->isLoggedIn($request)) {
            // Se não estiver logado, redireciona para /login
            return $response->withLocation(Router::url('/login'));
        }

        // Se estiver logado, continua para a próxima middleware/controller
        return $next($request, $response);
    }

    private function isLoggedIn(ServerRequest $request): bool
    {
        // Verifica se a sessão contém os dados do usuário autenticado
        return $request->getSession()->check('Auth.User');
    }
}