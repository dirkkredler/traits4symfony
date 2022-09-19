<?php

declare(strict_types=1);

namespace App\Controller\Trait;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Usage: 
 *
 `
    use Symfony\Component\Routing\RouterInterface;

    final class YourController
    {
        use Trait\Router;

        public function __construct(private RouterInterface $router) 
        {
        }
    ...
`
 *
 * `service.yaml`:
 *
 `
    App\Controller\:
        resource: "../src/Controller/"
        tags: ["controller.service_arguments"]
`
 */
trait Router 
{
    protected function generateUrl(
        string $route,
        array $parameters = [],
        int $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH
    ): string
    {
        return $this->router->generate($route, $parameters, $referenceType);
    }

    protected function redirect(
        string $url,
        int $status = 302
    ): RedirectResponse
    {
        return new RedirectResponse($url, $status);
    }

    protected function redirectToRoute(
        string $route,
        array $parameters = [],
        int $status = 302
    ): RedirectResponse
    {
        return $this->redirect($this->generateUrl($route, $parameters), $status);
    }
}
