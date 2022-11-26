<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\News\StoreRequest;
use App\Models\Feed;
use App\Models\User;
use App\Models\Storage;
use App\Exports\FeedsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use DB;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            $users = User::all();
            $search = $request->search;
            $search_user = $request->user;
            $news = Feed::whenSearch($request->search);
            if(isset($request->user)){
                $news->orWhere('user_id', $search_user);
            }
            if(isset($request->date_from) && isset($request->date_to)){
              $news->orWhereBetween(DB::raw('DATE(publish_date)'), [$request->date_from,$request->date_to]);
            }
            if($request->has('pdf'))
                {
                    $news = $news->get();
                    $pdf = Pdf::loadView('admin.pages.news.news_pdf',compact('news'));
                    return $pdf->download();
                }
                elseif ($request->has('excel')) {
                    $news = $news->get();
                   return Excel::download(new FeedsExport($news), 'news.xlsx');
                }
                else {
                     $news = $news->paginate(10);
                }
          
        return view('admin.pages.news.news',compact('news','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $users = User::all();
          return view('admin.pages.news.new_add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $new = new Feed();
        $new->title = $request->input('title');
        $new->content = $request->input('content');
        $new->publish_date = $request->input('publish_date');
        $new->user_id = $request->input('user_id');
        if (request()->main_img){
            $filename = time().'.'.request()->main_img->getClientOriginalExtension();
            request()->main_img->move(public_path('data/news'), $filename);
            $new->main_img=$filename;
            }
        $new->save();
        return redirect()->route('news.index')->with('success','News Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $new = Feed::where('id', $id)->first();
          return view('admin.pages.news.news_show', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = Feed::find($id);
        $users = User::all();
        return view('admin.pages.news.news_details', compact('new','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
         $new = Feed::find($id);
        $new->title = $request->input('title');
        $new->content = $request->input('content');
        $new->publish_date = $request->input('publish_date');
        $new->user_id = $request->input('user_id');
        if (request()->main_img){
            $filename = time().'.'.request()->main_img->getClientOriginalExtension();
            request()->main_img->move(public_path('data/news'), $filename);
            $new->main_img=$filename;
            }
        $new->save();
        return redirect()->route('news.index')->with('success','News Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = Feed::find($id);
        $new->delete();
        return redirect()->route('news.index')->with('success','News Deleted Successfully');
    }

    public function uploadImage(Request $request)
    {
        // dd($request->all());
        if($request->has('upload'))
        {
            $url = $request->file('upload')->store('images','public');
        }
        $url = 'storage/'.$url ;
        $CKEditorFuncNum = $request->CKEditorFuncNum;
        Storage::create(['photo'=>$url]);
        $message = '';
        $url = asset($url);
        echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$message'); </script> ";
    }
   
    public function news_change_satus(Request $request)
    {
        $news = Feed::where('id', $request->new_id)->first();
        if($request->has('active')){
            if($news->active ==0)
            {
                $news->update(['active' => 1]);
                return response()->json(['status' => true, 'result' => $news]);
            }
              if($news->active ==1)
            {
                $news->update(['active' =>0]);
                return response()->json(['status' => true, 'result' => $news]);
            }
        }
    }
    }
