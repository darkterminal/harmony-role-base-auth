<?php

namespace App\Middleware\System;

class AdminMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        // Check if user not signed in
        if (!$this->container->admin->check()) {
            
            // display flash message
            $this->container->flash->addMessage('error', 'Please sing in before doing that');

            // redirect
            return $response->withRedirect($this->container->router->pathFor('admin.signin'));
        }

        $response = $next($request, $response);
        return $response;
    }
}