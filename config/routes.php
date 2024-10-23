<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    // Rota para exibir o formulário de login (GET)
    $routes->connect(
        '/login',
        ['controller' => 'Login', 'action' => 'login'],
    );
    
    // Rota para o logout (GET)
    $routes->connect(
        '/logout',
        ['controller' => 'Login', 'action' => 'logout'],
    );

    $routes->scope('/users', function (RouteBuilder $routes) {
        // Rota para a listagem de usuários (index)
        $routes->connect('/', ['controller' => 'Users', 'action' => 'index']);

        // Rota para adicionar um novo usuário (add)
        $routes->connect('/add', ['controller' => 'Users', 'action' => 'add']);

        // Rota para visualizar um usuário (view)
        $routes->connect('/view/:id', ['controller' => 'Users', 'action' => 'view'], ['pass' => ['id']]);

        // Rota para editar um usuário (edit)
        $routes->connect('/edit/:id', ['controller' => 'Users', 'action' => 'edit'], ['pass' => ['id']]);

        // Rota para excluir um usuário (delete)
        $routes->connect('/delete/:id', ['controller' => 'Users', 'action' => 'delete'], ['pass' => ['id']]);
    });

    $routes->scope('/appointments', function (RouteBuilder $routes) {
        // Rota para a listagem de usuários (index)
        $routes->connect('/', ['controller' => 'Appointments', 'action' => 'index']);

        $routes->connect('/index-day/:day', ['controller' => 'Appointments', 'action' => 'indexDay'], ['pass' => ['day']]);

        // Rota para adicionar um novo usuário (add)
        $routes->connect('/add/:day', ['controller' => 'Appointments', 'action' => 'add'], ['pass' => ['day']]);

        // Rota para visualizar um usuário (view)
        $routes->connect('/view/:id', ['controller' => 'Appointments', 'action' => 'view'], ['pass' => ['id']]);

        // Rota para editar um usuário (edit)
        $routes->connect('/edit/:id', ['controller' => 'Appointments', 'action' => 'edit'], ['pass' => ['id']]);

        // Rota para excluir um usuário (delete)
        $routes->connect('/delete/:id', ['controller' => 'Appointments', 'action' => 'delete'], ['pass' => ['id']]);

        $routes->connect('/get-generic-data', ['controller' => 'Appointments', 'action' => 'getGenericData']);

        $routes->connect('/get-by-period', ['controller' => 'Appointments', 'action' => 'getByPeriod']);

        $routes->connect('/verify-appointments', ['controller' => 'Appointments', 'action' => 'verifyAppointments']);
    });

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
