<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Wiki;
use App\Category;

class MainController extends Controller
{
    public function index()
    {
        $wikis=Wiki::where('featured',1)->orderBy('id','DESC')->get();
        $news=News::orderBy('id','DESC')->limit(3)->get();
        $categories = Category::where('featured',1)->get();
        return view('index',compact('wikis','news','categories'));
    }

    public function news()
    {
        $news=News::orderBy('id','DESC')->paginate(3);
        return view('news',compact('news'));
    }

    public function loadNews()
    {
        $news=News::orderBy('id','DESC')->paginate(3);

        foreach ($news as $item){
            echo' <div class="post-content">
                            <img class="news-img" src="'.$item->image.'" alt="'.$item->title.'">
                            <a href="#" class="post-title">'.$item->title.'</a>';

        echo '<span class="post-date"> '.\Morilog\Jalali\Jalalian::forge($item->created_at)->format("%d");
        echo \Morilog\Jalali\Jalalian::forge($item->created_at)->format("%B %y") ;


                           echo'</span><p>
                               '.$item->text.'
                                </p>

                        </div>';
        }

    }

    public function shop()
    {
        $categories = Category::all();
        $agent =  new Agent();
        if(!$agent->isMobile() && !$agent->isTablet()){
            return view('shop',compact('categories'));
        }
        elseif($agent->isMobile() || $agent->isTablet()){
            return view('mobile.shop',compact('categories'));
        }
    }

    public function wiki()
    {
        $wikis=Wiki::orderBy('id','DESC')->get();
        return view('wiki',compact('wikis'));
    }
    public function singleWiki($cat_name)
    {
        $cat_name=str_replace('-',' ',$cat_name);
        $cat_id=Category::where('name',$cat_name)->value('id');
        $wiki_id=Wiki::where('cat_id',$cat_id)->value('id');
        $wiki=Wiki::find($wiki_id);

        return view('single-wiki',compact('wiki'));
    }

}
