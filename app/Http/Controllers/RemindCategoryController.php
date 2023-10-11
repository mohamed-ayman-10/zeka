<?php

namespace App\Http\Controllers;

use App\Models\RemindCategory;
use Illuminate\Http\Request;

class RemindCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = RemindCategory::query()->orderBy('id', 'DESC')->paginate(PAGINATION);
        return view('pages.remind category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.remind category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image'
        ]);

        $category = new RemindCategory();
        $category->name = $request->name;
        $category->image = uploadFile('uploads/remind category', $request->file('image'));
        $category->save();

        toastr()->success('Remind Category Added Successfully');
        return redirect()->route('remind_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RemindCategory $remindCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RemindCategory $remindCategory)
    {
        return view('pages.remind category.edit', compact('remindCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RemindCategory $remindCategory)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image'
        ]);

        $remindCategory->name = $request->name;
        if ($request->hasFile('image')) {
            deleteFile($remindCategory->image);
            $remindCategory->image = uploadFile('uploads/remind category', $request->file('image'));

        }
        $remindCategory->save();

        toastr()->success('Remind Category Updated Successfully');
        return redirect()->route('remind_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RemindCategory $remindCategory)
    {
        deleteFile($remindCategory->image);
        $remindCategory->delete();
        toastr()->success('Remind Category Deleted Successfully');
        return redirect()->route('remind_category.index');
    }
}
