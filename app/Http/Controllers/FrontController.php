<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Front\FrontService;


class FrontController extends Controller
{
    private $frontService;
    public function __construct(FrontService $frontService)
    {
        $this->frontService=$frontService;
    }
    public function home()
    {
        return $this->frontService->home();
    }

    public function about()
    {
        return $this->frontService->about();
    }

    public function testi()
    {
        return $this->frontService->testi();
    }
    public function service()
    {
        return $this->frontService->service();
    }

    public function serviceshow($slug)
    {
        return $this->frontService->serviceshow($slug);
    }

    public function portfolio()
    {
        return $this->frontService->portfolio();
    }

    public function portfolioshow($slug)
    {
        return $this->frontService->portfolioshow($slug);
    }

    public function blog()
    {
        return $this->frontService->blog();
    }

    public function blogshow($slug)
    {
        return $this->frontService->home($slug);
    }

    public function category($category)
    {
        return $this->frontService->category($category);
    }

    public function tag($tag)
    {
        return $this->frontService->tag($tag);
    }

    public function search()
    {
        return $this->frontService->search();
    }

    public function page($slug)
    {
        return $this->frontService->page($slug);        
    }

    public function subscribe($request)
    {
        return $this->frontService->subscribe($request);
    }

}
