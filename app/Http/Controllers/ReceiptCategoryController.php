<?php

namespace App\Http\Controllers;

use App\Models\ReceiptCategory;
use Illuminate\Http\Request;

class ReceiptCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ReceiptCategory::query()->orderBy('id', 'DESC')->paginate(PAGINATION);
        return view('pages.receipt category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.receipt category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $category = new ReceiptCategory();
        $category->name = $request->name;
        $category->save();

        toastr()->success('Receipt Category Added Successfully');
        return redirect()->route('receipt_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReceiptCategory $receiptCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReceiptCategory $receiptCategory)
    {
        return view('pages.receipt category.edit', compact('receiptCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReceiptCategory $receiptCategory)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image'
        ]);

        $receiptCategory->name = $request->name;
        $receiptCategory->save();

        toastr()->success('Receipt Category Updated Successfully');
        return redirect()->route('receipt_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReceiptCategory $receiptCategory)
    {
        $receiptCategory->delete();
        toastr()->success('Receipt Category Deleted Successfully');
        return redirect()->route('receipt_category.index');
    }
}
