<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class AppExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function paiementStatus($value): string
    {
        return match ($value){
            'succeeded' => 'EFFECTUE',
            'cancelled' => 'NON EFFECTUE',
            default => 'ENCOURS',
        };
    }

    public function cssPaiementStatus($value): string
    {
        return match ($value){
            'succeeded' => 'text-primary',
            'cancelled' => 'text-danger',
            default => 'text-indigo',
        };
    }
}
