<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\poster_adress;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PosterAdressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poster_adress= poster_adress::get();
        return view('admin.poster_adress.index',compact('poster_adress'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.poster_adress.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(poster_adress::rules());

        $data= $request->all();

       poster_adress::create($data);

         $notification =  array(
             'message' => 'تم اضافة القسم بنجاح',
             'alert-type' => 'success'
         );


         return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\poster_adress  $poster_adress
     * @return \Illuminate\Http\Response
     */
    public function show(poster_adress $poster_adress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\poster_adress  $poster_adress
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $poster_adress =poster_adress::findOrFail($id);
        return view('admin.poster_adress.edit',compact('poster_adress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\poster_adress  $poster_adress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(poster_adress::rules());
        $poster_adress=  poster_adress::findOrFail($id);
        $data= $request->all();
        $poster_adress->update($data);
        $notification =  array(
            'message' => 'تم تعديل اسم القسم  بنجاح',
            'alert-type' => 'success'
        );

    return redirect()->route('admin.posterAdress.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\poster_adress  $poster_adress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $poster_adress= poster_adress::findOrFail($id);
       $isDeleted = $poster_adress->delete();

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
