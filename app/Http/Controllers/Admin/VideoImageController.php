<?php

namespace App\Http\Controllers\Admin;

use App\Models\video_image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class VideoImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = video_image::latest()->get();
        return view('admin.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(video_image::rules());
       $data = $request->all();
       video_image::create($data);
       $notification =  array(
        'message' => 'تم اضافة الفيديو بنجاح',
        'alert-type' => 'success'
    );
      return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\video_image  $video_image
     * @return \Illuminate\Http\Response
     */
    public function show(video_image $video_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\video_image  $video_image
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
       $video = video_image::findOrFail($id);
        return view('admin.video.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\video_image  $video_image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $data =  $request->validate(video_image::updateRules());
        video_image::findOrFail($id)->update($data);
        $notification =  array(
            'message' => 'تم تعديل الفيديو بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.video.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\video_image  $video_image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = video_image::findOrFail($id);
        $isDeleted = $video->delete();


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
