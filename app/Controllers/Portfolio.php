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
    public function save(){

        $portfolio = new PortfolioModel();

        if($image=$this->request->getFile('artwork')){
            $newName=$image->getRandomName();
            $image->move('../public/uploads/', $newName);
            $data=[
                'name'=>$this->request->getVar('name'),
                'create_date'=>$this->request->getVar('create-date'),
                'artwork'=>$newName
            ];
            $portfolio->insert($data);
        }
        return $this->response->redirect(site_url('/portfolio/list'));
        
    }
    public function delete($id=null){
        $portfolio = new PortfolioModel();
        $dataPortfolio = $portfolio->where('id', $id)->first();

            $route = ('../public/uploads/'.$dataPortfolio['artwork']);
            unlink($route);

        $portfolio->where('id', $id)->delete();

        return $this->response->redirect(site_url('/portfolio/list'));
    }

}