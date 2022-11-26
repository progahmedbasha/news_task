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

class pdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $request;
            // $users = User::all();
            $search = $request->search;
            $news = Feed::whenSearch($request->search)->orWhereHas('User' , function($q) use($search) {
                $q->where('email',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->get();
        $pdf = Pdf::loadView('admin.pages.news.news_pdf',compact('news'));
        return $pdf->stream();
    }
}
