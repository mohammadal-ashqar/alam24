<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $clients= Clients::get();
       return view('admin.clients.index',compact('clients'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('admin.clients.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $request->validate(Clients::rules());
       if ($request->hasFile('images')) {
         $data= $request->except('images');
            $file = $request->file('images');
            $name=rand().time().$file->getClientOriginalName();
            $path = $file->storeAs('uploads',$name,['disk' =>'public']);
            $data['images']= $path;
                                     }
      Clients::create($data);

     $notification =  array(
         'message' => 'تم اضافة التعليق بنجاح',
         'alert-type' => 'success'
     );


 return redirect()->back()->with($notification);

   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Clients  $clients
    * @return \Illuminate\Http\Response
    */
   public function show(Clients $clients)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Clients  $clients
    * @return \Illuminate\Http\Response
    */
   public function edit( $id)
   {
       $clients =Clients::findOrFail($id);
       return view('admin.clients.edit',compact('clients'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Clients  $clients
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,  $id)
   {
       $request->validate(Clients::rules());
       $clients=  Clients::findOrFail($id);
       $old_image = $clients->images;

       $data= $request->except('images');
       $data['images'] = $old_image;
       if ($request->hasFile('images')) {
           $data= $request->except('images');
              $file = $request->file('images');
              $name=rand().time().$file->getClientOriginalName();
              $path = $file->storeAs('uploads',$name,['disk' =>'public']);
              $data['images']= $path;
              Storage::disk('public')->delete($old_image);
       }
       $clients->update($data);
       $notification =  array(
           'message' => 'تم تعديل الصورة  بنجاح',
           'alert-type' => 'success'
       );


   return redirect()->route('admin.proudacts.index')->with($notification);

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Clients  $clients
    * @return \Illuminate\Http\Response
    */
   public function destroy( $id)
   {
       $clients= Clients::findOrFail($id);
       $isDeleted = $clients->delete();
       Storage::disk('public')->delete($clients->images);
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

