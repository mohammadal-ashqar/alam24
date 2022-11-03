<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $categories= Category::get();
       return view('admin.categories.index',compact('categories'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('admin.categories.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $request->validate(Category::rules());
       $request->merge([
        'slug'=>Str::slug($request->name)
       ]);
       $data= $request->all();

      Category::create($data);

        $notification =  array(
            'message' => 'تم اضافة القسم بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);

   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function show(Category $category)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function edit( $id)
   {
       $categories =Category::findOrFail($id);
       return view('admin.categories.edit',compact('categories'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,  $id)
   {
       $request->validate(Category::rules());
       $category=  Category::findOrFail($id);
       $request->merge([
        'slug'=>Str::slug($request->name)
       ]);
       $data= $request->all();
       $category->update($data);
       $notification =  array(
           'message' => 'تم تعديل اسم القسم  بنجاح',
           'alert-type' => 'success'
       );


   return redirect()->route('admin.categories.index')->with($notification);

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function destroy( $id)
   {
       $category= Category::findOrFail($id);
       $isDeleted = $category->delete();

       if ($isDeleted) {
           return response()->json([
               'title'=>'تم الحذف بنجاح',
               'text'=>'News Deleted successfully',
               'icon'=>'success'
           ], Response::HTTP_OK);
       }else {
           return response()->json([
               'title'=>'هناك خطأ لم تتم عملية الحذف',
               'text'=>'Failed to delete',
               'icon'=>'error'
           ], Response::HTTP_BAD_REQUEST);

       }
       }
   }
