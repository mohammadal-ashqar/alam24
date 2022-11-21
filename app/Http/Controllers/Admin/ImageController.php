<?php

namespace App\Http\Controllers\Admin;


use App\Models\image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = image::latest()->get();
        return view('admin.image.index',compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(image::rules());
        if ($request->hasFile('image')) {
            $data = $request->except('image');
            $file = $request->file('image');
            $name = rand() . time() . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/image', $name, ['disk' => 'public']);
            $data['image'] = $path;
        }

        image::create($data);
        $notification =  array(
            'message' => 'تم اضافة الصورة بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $image= image::findOrFail($id);
        return view('admin.image.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate(image::updateRules());
        $image =  image::findOrFail($id);
        $old_image = $image->image;
        $data = $request->except('image');
        $data['image'] = $old_image;
        if ($request->hasFile('image')) {
            $data = $request->except('image');
            $file = $request->file('image');
            $name = rand() . time() . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/image', $name, ['disk' => 'public']);
            $data['image'] = $path;
            Storage::disk('public')->delete($old_image);
        }
        $image->update($data);
        $notification =  array(
            'message' => 'تم تعديل الصورة بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.image.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $image = image::findOrFail($id);
        $isDeleted = $image->delete();
        Storage::disk('public')->delete($image->image);


        if ($isDeleted) {
            return response()->json([
                'title' => 'تم الحذف بنجاح',
                'text' => 'image Deleted successfully',
                'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'title' => 'هناك خطأ لم تتم عملية الحذف',
                'text' => 'Failed to delete',
                'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
