<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:news-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    //      $this->middleware('auth');
    // }

    public function index()
    {
        $news = News::get();
        return view('admin.news.index', compact('news'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('admin.news.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate(News::rules());
        if ($request->hasFile('image')) {
            $data = $request->except('image','files');
            $file = $request->file('image');
            $name = rand() . time() . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/news', $name, ['disk' => 'public']);
            $data['image'] = $path;
        }
        if ($request->hasFile('files')) {
            $data_images[]=[];
            $x = 0;
            // $data = $request->except('files');
            foreach ($request->file('files') as $files) {
                $name = rand() . time() . $files->getClientOriginalName();
                $path = $files->storeAs('uploads/posts_files', $name, ['disk' => 'public']);
                $data_images[$x] = $path;
                $data['files'] = $data_images;
                $x++;
            }
        }
        News::create($data);
        $notification =  array(
            'message' => 'تم اضافة الخبر بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }


    public function edit( $id, )
    {
        $news= news::findOrFail($id);
        $categories = Category::get();
        return view('admin.news.edit', compact('news', 'categories'));
    }


    public function news_push($id)
    {
        $news = News::findOrFail($id);
        $status = $news->status;
        if ($status == 'publish') {
            $news->update([
                'status' => 'unpublish'
            ]);
        } else {
            $news->update([
                'status' => 'publish'
            ]);
        }
        return  redirect()->back();
    }




    public function update(Request $request,News $news)
    {
        $request->validate(News::updateRules());

        $old_image = $news->image;
        $old_files = $news->files;

        $data = $request->except('image', 'files');

        $data['image'] = $old_image;
        $data['files'] = $old_files;



        if ($request->hasFile('image')) {
            $data = $request->except('image');
            $file = $request->file('image');
            $name = rand() . time() . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/news', $name, ['disk' => 'public']);
            $data['image'] = $path;
            Storage::disk('public')->delete($old_image);
        }



        if ($request->hasFile('files')) {
            $data_images[]=[];
            $x = 0;
            foreach ($request->file('files') as $files) {
                $name = rand() . time() . $files->getClientOriginalName();
                $path = $files->storeAs('uploads/posts_files', $name, ['disk' => 'public']);
                $data_images[$x] = $path;
                $data['files'] = $data_images;
                $x++;
            }
            foreach ($old_files as $file) {
                Storage::disk('public')->delete($file);
            }
        }


        $news->update($data);
        $notification =  array(
            'message' => 'تم تعديل الخبر بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.news.index')->with($notification);
    }





    public function destroy($id)
    {

        $news = News::findOrFail($id);
        $isDeleted = $news->delete();
        Storage::disk('public')->delete($news->image);

        foreach ($news->files as $file) {
            Storage::disk('public')->delete($file);
        }
        if ($isDeleted) {
            return response()->json([
                'title' => 'تم الحذف بنجاح',
                'text' => 'News Deleted successfully',
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
