<?php

namespace App\Manager\Front;

use App\Repositories\Interfaces\FrontRepositoryInterface;
class FrontManager
{
    private $frontRepository;
    public function __construct(FrontRepositoryInterface $frontRepository)
    {
        $this->frontRepository=$frontRepository;
    }
    public function home()
    {
        return $this->frontRepository->home(); 
    }

    public function about()
    {
        return $this->frontRepository->about(); 
    }

    public function testi()
    {
        return $this->frontRepository->testi(); 
    }
    public function service()
    {
        return $this->frontRepository->service(); 
    }

    public function serviceshow($slug)
    {
        return $this->frontRepository->serviceshow($slug); 
    }

    public function portfolio()
    {
        return $this->frontRepository->portfolio(); 
    }

    public function portfolioshow($slug)
    {
        return $this->frontRepository->portfolioshow($slug); 
    }

    public function blog()
    {
        return $this->frontRepository->blog(); 
    }

    public function blogshow($slug)
    {
        return $this->frontRepository->blogshow($slug); 
    }

    public function category($category)
    {
        return $this->frontRepository->category($category); 
    }

    public function tag($tag)
    {
        return $this->frontRepository->tag($tag); 
    }

    public function search()
    {
        return $this->frontRepository->search(); 
    }

    public function page($slug)
    {
        return $this->frontRepository->page($slug); 
    }

    public function subscribe($request)
    {
        return $this->frontRepository->subscribe($request); 
    }
}
