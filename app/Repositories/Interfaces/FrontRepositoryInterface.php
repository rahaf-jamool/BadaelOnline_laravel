<?php
 
namespace App\Repositories\Interfaces;

interface FrontRepositoryInterface{

    public function home();

    public function about();

    public function testi();

    public function service();

    public function serviceshow($slug);

    public function portfolio();

    public function portfolioshow($slug);

    public function blog();

    public function blogshow($slug);

    public function category();

    public function tag();

    public function search();

    public function page($slug);

    public function subscribe();

}