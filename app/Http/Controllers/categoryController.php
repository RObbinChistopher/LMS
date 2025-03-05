<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ChildCategoryResource;
use App\Http\Resources\SubCategoryResource;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return CategoryResource::collection($category);
    }

    public function showAllCategory()
    {
        $category = Category::all();
        return CategoryResource::collection($category);
    }

    public function createCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return response()->json(['message' => 'Category created successfully'], 201);
    }

    public function editCategory(string $id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }
    public function updateCategory(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return response()->json(['message' => 'Category Update successfully'], 201);
    }
    public function deleteCategory(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category Delete successfully'], 201);
    }
    public function categorySearch(Request $request)
    {
        $query = $request->input('query.query');

        $results = Category::where('name', 'like', "%$query%")
            ->limit(5)
            ->get();

        return CategoryResource::collection($results);
    }

    // SUBCATEGORY

    public function subcategoryIndex()
    {
        $subCategory = SubCategory::paginate(10);
        return SubCategoryResource::collection($subCategory);
    }
    public function subcategoryShowAll()
    {
        $subCategory = SubCategory::all();
        return SubCategoryResource::collection($subCategory);
    }
    public function createSubCategory(Request $request)
    {
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->catId = $request->catId;

        $subCategory->save();
        return response()->json(['message' => 'SubCategory Create successfully'], 201);
    }
    public function editSubCategory(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return new SubCategoryResource($subCategory);
    }
    public function updateSubCategory(Request $request, string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->name = $request->name;
        $subCategory->catId = $request->catId;

        $subCategory->save();
        return response()->json(['message' => 'SubCategory Update successfully'], 201);
    }
    public function DeleteSubCategory(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        return response()->json(['message' => 'SubCategory Delete successfully'], 201);
    }
    public function subCategorySearch(Request $request)
    {
        $query = $request->input('query.query');

        $results = SubCategory::where('name', 'like', "%$query%")
            ->limit(5)
            ->get();

        return SubCategoryResource::collection($results);
    }
    public function subcategoryById(string $id)
    {
        $subCategory = SubCategory::where('catId', $id)->get();
        return SubCategoryResource::collection($subCategory);
    }


    // child Category
    public function childCategoryById(string $id)
    {
        $Category = ChildCategory::where('subCatId', $id)->get();
        return ChildCategoryResource::collection($Category);
    }
    public function childCategoryIndex()
    {
        $child = ChildCategory::paginate(10);
        return ChildCategoryResource::collection($child);
    }
    public function AllChildCategory()
    {
        $child = ChildCategory::all();
        return ChildCategoryResource::collection($child);
    }

    public function createChildCategory(Request $request)
    {
        $child = new ChildCategory();
        $child->name = $request->name;
        $child->catId = $request->catId;
        $child->subCatId = $request->subCatId;

        $child->save();
        return response()->json(['message' => 'Child Category Create successfully'], 201);
    }
    public function editChildCategory(string $id)
    {
        $child = ChildCategory::findOrFail($id);
        return new ChildCategoryResource($child);
    }
    public function updateChildCategory(Request $request, string $id)
    {
        $child = ChildCategory::findOrFail($id);
        $child->name = $request->name;
        $child->catId = $request->catId;
        $child->subCatId = $request->subCatId;

        $child->save();
        return response()->json(['message' => 'Child Category Update successfully'], 201);
    }
    public function deleteChildCategory(string $id)
    {
        $child = ChildCategory::findOrFail($id);
        $child->delete();
        return response()->json(['message' => 'Child Category Delete successfully'], 201);
    }
    public function childCategorySearch(Request $request)
    {
        $query = $request->input('query.query');

        $results = ChildCategory::where('name', 'like', "%$query%")
            ->limit(5)
            ->get();

        return ChildCategoryResource::collection($results);
    }
}
