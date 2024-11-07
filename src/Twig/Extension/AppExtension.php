<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\AppExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('wave_paiement_status', [AppExtensionRuntime::class, 'paiementStatus']),
            new TwigFilter('wave_paiement_css', [AppExtensionRuntime::class, 'cssPaiementStatus']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('wave_paiement_status', [AppExtensionRuntime::class, 'paiementStatus']),
            new TwigFunction('wave_paiement_css', [AppExtensionRuntime::class, 'cssPaiementStatus']),
        ];
    }
}
