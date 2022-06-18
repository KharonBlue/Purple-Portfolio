<?php 
namespace App\Controllers;

use App\Models\PortfolioModel;

class Portfolio extends BaseController{

    public function list(){

        $portfolio = new PortfolioModel();
        $dates['portfolios']= $portfolio->orderBy('id','ASC')->findAll();

        return view('portfolio/list', $dates);
    }

    public function create(){
        return view('portfolio/create');
    }
    public function edit(){
        return view('portfolio/edit');
    }
}