<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCompanyCategoryRequest;
use App\Http\Requests\Admin\UpdateCompanyCategoryRequest;
use App\Models\CompanyCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CompanyCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CompanyCategory::class, 'company_category');
    }

    public function index(): View
    {
        $companyCategories = CompanyCategory::paginate(8);

        return view('admin.company_category.index', compact('companyCategories'));
    }

    public function create(): View
    {
        return view('admin.company_category.create');
    }

    public function store(StoreCompanyCategoryRequest $request): RedirectResponse
    {
        CompanyCategory::create($request->validated());

        return redirect()
            ->route('admin.company_category.index')
            ->with('message', 'Record has been created');
    }

    public function edit(CompanyCategory $companyCategory): View
    {
        return view('admin.company_category.edit', compact('companyCategory'));
    }

    public function update(UpdateCompanyCategoryRequest $request, CompanyCategory $companyCategory): RedirectResponse
    {
        $companyCategory->update($request->validated());

        return redirect()
            ->route('admin.company_category.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(CompanyCategory $companyCategory): RedirectResponse
    {
        $companyCategory->delete();

        return redirect()
            ->route('admin.company_category.index')
            ->with('message', 'Record has been deleted');
    }
}
