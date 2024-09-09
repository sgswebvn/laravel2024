<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Category::join('users', 'categories.user_id', '=', 'users.id')
            ->select('categories.*', 'users.status as status');
        if ($search) {
            $categories = $query->where('categories.name', 'like', "%$search%")->paginate(10);
            $request->session()->flash('search', $categories->total());
        } else {
            $categories = $query->paginate(10);
        }

        return view('admin.Category.index', compact('categories'));
    }


    public function clearSearch(Request $request)
    {
        $request->session()->forget('search');
        return response()->json(['status' => 'success']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Tạo danh mục thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.Category.edit', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'nullable|string|max:255',
        ]);

        $categories = Category::findOrFail($id);
        $categories->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công');
    }
}
