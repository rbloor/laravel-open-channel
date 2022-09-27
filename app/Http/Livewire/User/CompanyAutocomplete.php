<?php

namespace App\Http\Livewire\User;

use App\Models\Company;

class CompanyAutocomplete extends Autocomplete
{
    protected $listeners = ['valueSelected'];

    public function valueSelected(Company $company)
    {
        $this->emitUp('companySelected', $company);
    }

    public function query()
    {
        return Company::where('name', 'like', '%' . $this->search . '%')->orderBy('name');
    }
}
