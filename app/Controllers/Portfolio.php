<?php 
namespace App\Controllers;

use App\Models\PortfolioModel;

class Portfolio extends BaseController{

    public function list(){

        $portfolio = new PortfolioModel();
        $dates['portfolios']= $portfolio->orderBy('id','ASC')->findAll();
        $dates['head']= view('template/head');
        $dates['footer']= view('template/footer');

        return view('portfolio/list', $dates);
    }

    public function create(){
        $dates['head']= view('template/head');
        $dates['footer']= view('template/footer');
        return view('portfolio/create', $dates);
    }
    public function edit(){
        $dates['head']= view('template/head');
        $dates['footer']= view('template/footer');
        return view('portfolio/edit', $dates);
    }
}