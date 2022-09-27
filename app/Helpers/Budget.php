<?php

namespace App\Helpers;

use App\Models\Setting;

class Budget
{
    public function calculate($amount, $tax_region, $tax_bracket): array
    {
        $vat_value = Setting::where('setting_key', 'vat_rate')->first()->setting_value;
        $ni_value = Setting::where('setting_key', 'ni_rate')->first()->setting_value;

        $vat_rate = $tax_region !== 'roi' ? $vat_value : $vat_value;
        $tax_rate = $tax_region !== 'roi' ? $tax_bracket / 100 : 0;
        $ni_rate = $tax_region !== 'roi' ? $ni_value : 0;

        $vat_payable =  $amount * $vat_rate;
        $total_value = $amount + $vat_payable;
        $tax_payable = $total_value * $tax_rate;
        $ni_payable = $total_value * $ni_rate;
        $total_tax_payable = $tax_payable + $ni_payable;
        $total_budget_allocation = $total_value + $total_tax_payable;

        return [
            'gross' => $amount,
            'vat_payable' => $vat_payable,
            'total_value' => $total_value,
            'tax_payable' => $tax_payable,
            'ni_payable' => $ni_payable,
            'total_tax_payable' => $total_tax_payable,
            'total_budget_allocation' => $total_budget_allocation,
        ];
    }
}
