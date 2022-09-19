<?php

declare(strict_types=1);

namespace App\Controller\Trait;

/**
 * Usage:
 *
 `
    use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

    final class YourController
    {
        use Trait\Parameter;

        public function __construct(private ContainerBagInterface $parameterBag) 
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
trait Parameter
{
    protected function getParameter(string $name): array|bool|string|int|float|\UnitEnum|null
    {
        return $this->parameterBag->get($name);
    }
}
