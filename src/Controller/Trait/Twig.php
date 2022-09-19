<?php

declare(strict_types=1);

namespace App\Controller\Trait;

use Symfony\Component\HttpFoundation\Response;

/**
 * Usage:
 *
 `
    use Twig\Environment;

    final class YourController
    {
        use Trait\Twig;

        public function __construct(private Environment $twig) 
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
trait Twig
{
    protected function render(
        string $view,
        array $parameters = [],
        Response $response = new Response()
    ): Response
    {
        return $response->setContent($this->twig->render($view, $parameters));
    }
}
