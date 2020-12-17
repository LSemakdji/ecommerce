<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AmountExtension extends AbstractExtension
{

    public function getFilters()
    {
        return [
            new TwigFilter('amount', [$this, 'amount'])
        ];
    }
    public function amount($value, string $symbol = '€', string $decsep = ',', $thousandsep = ' ')
    {
        //19929 => 192,29 €
        $finalValue = $value / 100;

        // 192.29
        // On formate avec ## 2 chiffre decimale ## une virgule pour séparer entiers/decimales puis ## un espace pour séparer le chiffre des // miliers ##
        $finalValue = number_format($finalValue, 2, $decsep, $thousandsep);
        // 192,29
        return $finalValue . ' ' . $symbol;
    }
}
