<?php

namespace App\Manager\Front;

use Illuminate\Http\Request;
use App\Models\{About, Banner, Category, Faq, General, Link, Page, Partner, Pcategory, Portfolio, Post, Tag, Team, Testimonial, Service, Subscriber};
use Illuminate\Support\Facades\Validator;

class FrontManager
{
  
    private $tag;
    private $category;

    public function __construct(Tag $tag,Category $category)
    {
        $this->tag=$tag;
        $this->category=$category;

    }
    public function home()
    {
        $about = About::find(1);
        $banner = Banner::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $partner = Partner::orderBy('name','asc')->limit(8)->get();
        $pcategories = Pcategory::all();
        $portfolio = Portfolio::all();
        $service = Service::orderBy('title','asc')->get();
//        return view ('front.home',compact('about','banner','general','link','lpost','partner','pcategories','portfolio','service'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('about','banner','general','link','lpost','partner','pcategories','portfolio','service')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function about()
    {
        $about = About::find(1);
        $faq = Faq::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $partner = Partner::orderBy('name','asc')->get();
        $team = Team::orderBy('id','asc')->get();
//        return view ('front.about',compact('about','faq','general','link','lpost','partner','team'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('about','faq','general','link','lpost','partner','team')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));

    }

    public function testi()
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $testi = Testimonial::orderBy('name','asc')->paginate(6);
//        return view ('front.testi',compact('general','link','lpost','testi'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('general','link','lpost','testi')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));;
    }
    public function service()
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $service = Service::orderBy('title','asc')->get();
//        return view ('front.service',compact('general','link','lpost','service'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('general','link','lpost','service')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function serviceshow($slug)
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $service = Service::where('slug', $slug)->firstOrFail();
//        return view ('front.serviceshow',compact('general','link','lpost','service'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('general','link','lpost','service')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function portfolio()
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $pcategories = Pcategory::all();
        $portfolio = Portfolio::all();
//        return view ('front.portfolio',compact('general','link','lpost','pcategories','portfolio'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('general','link','lpost','pcategories','portfolio')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function portfolioshow($slug)
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
//        return view ('front.portfolioshow',compact('general','link','lpost','portfolio'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('general','link','lpost','portfolio')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function blog()
    {
        $categories = Category::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $posts = Post::where('status','=','PUBLISH')->orderBy('id','desc')->paginate(3);
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::all();
        
//        return view ('front.blog',compact('categories','general','link','lpost','posts','recent','tags'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('categories','general','link','lpost','posts','recent','tags')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));

    }

    public function blogshow($slug)
    {
        $categories = Category::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $post = Post::where('slug', $slug)->firstOrFail();
        $old = $post->views;
        $new = $old + 1;
        $post->views = $new;
        $post->update();
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::get();

//        return view ('front.blogshow',compact('categories','general','link','lpost','post','recent','tags'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('categories','general','link','lpost','post','recent','tags')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function category()
    {
        $categories = Category::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $posts = $this->category->posts()->latest()->paginate(6);
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::all();
//        return view ('front.blog',compact('categories','general','link','lpost','posts','recent','tags'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('categories','general','link','lpost','posts','recent','tags')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function tag()
    {
        $categories = Category::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $posts = $this->tag->posts()->latest()->paginate(12);
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::all();
//        return view ('front.blog',compact('categories','general','link','lpost','posts','recent','tags'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('categories','general','link','lpost','posts','recent','tags')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function search()
    {
       
        $query = request("query");
        
        $categories = Category::all();
        $general = General::find(1); 
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $posts = Post::where("title","like","%$query%")->latest()->paginate(9);
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::all();
        
//        return view('front.blog',compact('categories','general','link','lpost','posts','query','recent','tags'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('categories','general','link','lpost','posts','query','recent','tags')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function page($slug)
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
        $page = Page::where('slug', $slug)->firstOrFail();
//        return view('front.page',compact('general','link','lpost','page'));
        return response()->json([
            'status' => 'sucssess' ,
            'statusCode' => '200' ,
            'error' => null ,
            'data'=>   compact('general','link','lpost','page')  ,] , 200)
            ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function subscribe(Request $request)
    {
        Validator::make($request->all(), [
            "email" => "required|unique:subscribers,email",        
        ])->validate();

        $subs = new Subscriber();
        $subs->email = $request->email;
        if ( $subs->save()) {

            return redirect()->route('homepage')->with('success', 'You have successfully subscribed');
    
           } else {
               
            return redirect()->back();
    
           }
    }
}