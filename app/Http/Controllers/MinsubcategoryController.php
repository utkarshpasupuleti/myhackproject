<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Minsubcategory;
use Illuminate\Http\Request;

class MinsubcategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'name' => 'required|string|max:255',
        ]);

        Minsubcategory::create($request->all());
        return redirect()->route('categories.index');
    }

    // Add methods for show, edit, update, destroy as needed
}
