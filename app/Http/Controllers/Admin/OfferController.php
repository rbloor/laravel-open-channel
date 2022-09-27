<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOfferRequest;
use App\Http\Requests\Admin\UpdateOfferRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Offer::class, 'offer');
    }

    public function index(): View
    {
        $offers = Offer::paginate(8);

        return view('admin.tool.offer.index', compact('offers'));
    }

    public function create(): View
    {
        return view('admin.tool.offer.create');
    }

    public function store(StoreOfferRequest $request): RedirectResponse
    {
        $offer = Offer::create($request->validated());

        if ($request->hasFile('filename')) {
            $request->filename->store('offers', 'public');
            $offer->filename = $request->filename->hashName();
            $offer->save();
        }

        return redirect()
            ->route('admin.tool.offer.index')
            ->with('message', 'Record has been created');
    }

    public function edit(Offer $offer): View
    {
        return view('admin.tool.offer.edit', compact('offer'));
    }

    public function update(UpdateOfferRequest $request, Offer $offer): RedirectResponse
    {
        $offer->update($request->validated());

        if ($request->hasFile('filename')) {
            if (!empty($offer->filename)) {
                if (Storage::disk('public')->exists("offers/" . $offer->filename)) {
                    Storage::disk('public')->delete("offers/" . $offer->filename);
                }
            }
            $request->filename->store('offers', 'public');
            $offer->filename = $request->filename->hashName();
            $offer->save();
        }

        return redirect()
            ->route('admin.tool.offer.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(Offer $offer): RedirectResponse
    {
        if (!empty($offer->filename)) {
            if (Storage::disk('public')->exists("offers/" . $offer->filename)) {
                Storage::disk('public')->delete("offers/" . $offer->filename);
            }
        }

        $offer->delete();

        return redirect()
            ->route('admin.tool.offer.index')
            ->with('message', 'Record has been deleted');
    }
}
