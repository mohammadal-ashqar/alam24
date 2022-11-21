<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\poster;
use App\Models\poster_adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posters = poster::get();
        return view('admin.posters.index', compact('posters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $posters= poster::get();
        $poster_adress = poster_adress::get();

        return view('admin.posters.create',compact('posters','poster_adress'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(poster::rules());
        $data= $request->all();
        if ($request->hasFile('images')) {
            $data = $request->except('images');

            $data_images[]=[];
            $x = 0;
            foreach ($request->file('images') as $images) {
                $name = rand() . time() . $images->getClientOriginalName();
                $path = $images->storeAs('uploads/posters', $name, ['disk' => 'public']);
                $data_images[$x] = $path;
                $data['images'] = $data_images;
                $x++;
            }
        }

        poster::create($data);
        $notification =  array(
            'message' => 'تم اضافة الاعلان بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show(poster $poster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $poster = poster::findOrFail($id);
        $poster_adress = poster_adress::get();
        return view('admin.posters.edit', compact('poster', 'poster_adress'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate(poster::updateRules());
        $poster =  poster::findOrFail($id);
        $old_images = $poster->images;
        $data = $request->except('images');
        $data['image'] = $old_images;





        if ($request->hasFile('images')) {
            $data_images[]=[];
            $x = 0;
            foreach ($request->file('images') as $images) {
                $name = rand() . time() . $images->getClientOriginalName();
                $path = $images->storeAs('uploads/posters', $name, ['disk' => 'public']);
                $data_images[$x] = $path;
                $data['images'] = $data_images;
                $x++;
            }
            foreach ($old_images as $file) {
                Storage::disk('public')->delete($file);
            }
        }


        $poster->update($data);
        $notification =  array(
            'message' => 'تم تعديل الاعلان بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.poster.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $poster = poster::findOrFail($id);
        $isDeleted = $poster->delete();
        foreach ($poster->images as $file) {
            Storage::disk('public')->delete($file);
        }
        if ($isDeleted) {
            return response()->json([
                'title' => 'تم الحذف بنجاح',
                'text' => 'poster Deleted successfully',
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
