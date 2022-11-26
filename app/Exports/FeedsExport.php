<?php

namespace App\Exports;

use App\Models\Feed;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class FeedsExport implements FromView
{
    public $data;
    public function __construct($data)
    {
        // dd($data);
        $this->data =  $data;
        // dd($this->data);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	
        return view('admin.pages.news.news_export', [
            'news' =>$this->data,
        ]);
    }
}
