<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCompanyRequest;
use App\Http\Requests\Admin\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\CompanyCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Company::class, 'company');
    }

    public function index(): View
    {
        $companies = Company::with('company_category')->paginate(8);

        return view('admin.company.index', compact('companies'));
    }

    public function create(): View
    {
        $companyCategories = CompanyCategory::all();

        return view('admin.company.create', compact('companyCategories'));
    }

    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        Company::create($request->validated());

        return redirect()
            ->route('admin.company.index')
            ->with('message', 'Record has been created');
    }

    public function edit(Company $company): View
    {
        $companyCategories = CompanyCategory::withTrashed()->get();

        return view('admin.company.edit', compact('company', 'companyCategories'));
    }

    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->validated());

        return redirect()
            ->route('admin.company.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(Company $company): RedirectResponse
    {
        if ($company->users()->exists()) {

            return redirect()
                ->route('admin.company.index')
                ->with('error', 'Cannot delete this record');
        }

        $company->delete();

        return redirect()
            ->route('admin.company.index')
            ->with('message', 'Record has been deleted');
    }
}
