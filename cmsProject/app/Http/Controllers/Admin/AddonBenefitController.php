<?php
// app/Http/Controllers/Admin/AddonBenefitController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddonBenefit;
use Illuminate\Http\Request;

class AddonBenefitController extends Controller
{
    public function index()
    {
        $addons = AddonBenefit::latest()->paginate(10);
        return view('admin.addon-benefits.index', compact('addons'));
    }

    public function create()
    {
        return view('admin.addon-benefits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon_class' => 'required',
            'title' => 'required',
            'subtitle' => 'nullable',
        ]);

        AddonBenefit::create($request->only('icon_class', 'title', 'subtitle'));

        return redirect()->route('admin.addon-benefits.index')
            ->with('success', 'Addon Benefit created successfully.');
    }

    public function edit(AddonBenefit $addon_benefit)
    {
        return view('admin.addon-benefits.edit', compact('addon_benefit'));
    }

    public function update(Request $request, AddonBenefit $addon_benefit)
    {
        $request->validate([
            'icon_class' => 'required',
            'title' => 'required',
            'subtitle' => 'nullable',
        ]);

        $addon_benefit->update($request->only('icon_class', 'title', 'subtitle'));

        return redirect()->route('addon-benefits.index')
            ->with('success', 'Addon Benefit updated successfully.');
    }

    public function destroy(AddonBenefit $addon_benefit)
    {
        $addon_benefit->delete();
        return redirect()->route('addon-benefits.index')
            ->with('success', 'Addon Benefit deleted successfully.');
    }
}
