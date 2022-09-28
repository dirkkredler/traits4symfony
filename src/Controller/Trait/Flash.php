<?php

declare(strict_types=1);

namespace App\Controller\Trait;

use LogicException;

# use Symfony\Component\HttpFoundation\RequestStack;
/**
 * Usage: 
 *
 `
    use Symfony\Component\HttpFoundation\RequestStack;

    final class YourController
    {
        use Trait\Flash;

        public function __construct(private RequestStack $requestStack) 
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

trait Flash
{
    /**
     * Adds a flash message to the current session for type.
     *
     * @throws LogicException
     */
    protected function addFlash(string $type, mixed $message): void
    {
        try {
            $this->requestStack->getSession()->getFlashBag()->add($type, $message);
        } catch (SessionNotFoundException $e) {
            throw new LogicException('You cannot use the addFlash method if sessions are disabled. Enable them in "config/packages/framework.yaml".', 0, $e);
        }
    }
}
