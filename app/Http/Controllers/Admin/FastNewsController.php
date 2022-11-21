<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FastNews;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FastNewsController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $fastNews= FastNews::get();
        return view('admin.fast_news.index',compact('fastNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fast_news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(FastNews::rules());
        $data= $request->all();

        FastNews::create($data);

          $notification =  array(
              'message' => 'تم اضافة الخبر  بنجاح',
              'alert-type' => 'success'
          );


          return redirect()->back()->with($notification);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FastNews  $fastNews
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $fast_news =FastNews::findOrFail($id);
        return view('admin.fast_news.edit',compact('fast_news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FastNews  $fastNews
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
            $fast_news =FastNews::findOrFail($id);
            $request->validate(FastNews::rules());
            $data= $request->all();

            $fast_news->update($data);

            $notification =  array(
                'message' => 'تم تعديل الخبر  بنجاح',
                'alert-type' => 'success'
            );


          return redirect()->route('admin.fastNews.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FastNews  $fastNews
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy( $id)
    {

       $fastNews= FastNews::findOrFail($id);
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
