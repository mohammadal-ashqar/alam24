<?php

namespace App\Http\Controllers\Admin;

use App\Models\Live;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class LiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $live= Live::get();
        return view('admin.live.index',compact('live'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.live.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Live::rules());
        $data= $request->all();

        Live::create($data);

          $notification =  array(
              'message' => 'تم اضافة رابط البث  بنجاح',
              'alert-type' => 'success'
          );


          return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Live  $live
     * @return \Illuminate\Http\Response
     */
    public function show(Live $live)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Live  $live
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $live =Live::findOrFail($id);
        return view('admin.live.edit',compact('live'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Live  $live
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $fast_news =Live::findOrFail($id);
        $request->validate(Live::rules());
        $data= $request->all();

        $fast_news->update($data);

        $notification =  array(
            'message' => 'تم تعديل رابط البث  بنجاح',
            'alert-type' => 'success'
        );


      return redirect()->route('admin.live.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Live  $live
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $fastNews= Live::findOrFail($id);
        $isDeleted = $fastNews->delete();

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
