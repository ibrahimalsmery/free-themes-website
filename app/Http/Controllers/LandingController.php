<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LandingController extends Controller
{
    //

    public function index_page(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Theme::query())->make(true);
        }

        // <meta name="author" content="">
        $params = [
            'page_title' => 'Free Themes | Template | Admin Dashboards | Bootstrap | Bootstrap 5 ',

            'metas' => $this->handleMetas([
                ['name' => 'keywords', 'content' => 'Bootstrap,Dashboard,Template,Admin,Free,Themes,preview'],
                ['name' => 'description', 'content' => 'Free Template dashboard download and preview'],
                ['name' => 'author', 'content' => 'ibrahim alsimiry or ibrahim alsmairi'],
            ])
        ];








        return view('welcome', $params);
    }


    public function handleMetas($array)
    {
        $MetaHtmlTags = '';
        foreach ($array as $meta) {
            $metaTag = '<meta ';
            foreach ($meta as $key => $value) {
                $metaTag .= "{$key}='{$value}' ";
            }
            $metaTag .= " />\n";
            $MetaHtmlTags .= $metaTag;
        }
        return $MetaHtmlTags;
    }
}
