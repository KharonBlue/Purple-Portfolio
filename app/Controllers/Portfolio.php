<?php 
namespace App\Controllers;

use App\Models\PortfolioModel;

class Portfolio extends BaseController{

    public function list(){

        $portfolio = new PortfolioModel();
        $data['portfolios']= $portfolio->orderBy('id','ASC')->findAll();
        $data['head']= view('template/head');
        $data['footer']= view('template/footer');

        return view('portfolio/list', $data);
    }

    public function create(){
        $data['head']= view('template/head');
        $data['footer']= view('template/footer');
        return view('portfolio/create', $data);
    }
    
    public function save(){
        
        $portfolio = new PortfolioModel();

        $validate = $this->validate([
            'name' => 'required|min_length[3]',
            'artwork' => [
                'uploaded[artwork]',
                'mime_in[artwork,image/jpg,image/jpeg,image/png]',
                'max_size[artwork, 1024]'
            ]
        ]);
        if(!$validate){
            $session = session();
            $session->setFlashdata('message', 'Revise la información');

            return \redirect()->back()->withInput();
        }

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
    
        public function edit($id=null){
            $data['head']= view('template/head');
            $data['footer']= view('template/footer');
    
            $portfolio = new PortfolioModel();
            $data['portfolio'] = $portfolio->where('id', $id)->first();
            return view('portfolio/edit', $data);
        }
    
        public function update(){
            $portfolio = new PortfolioModel();

            $data=[
                'name'=>$this->request->getVar('name'),
                'create_date'=>$this->request->getVar('create-date')
            ];
            $id = $this->request->getVar('id');
            
            $validate = $this->validate([
                'name' => 'required|min_length[3]'
            ]);
            if(!$validate){
                $session = session();
                $session->setFlashdata('message', 'Revise la información');
    
                return \redirect()->back()->withInput();
            }

            $portfolio->update($id, $data);
        
            $validate = $this->validate([
                'artwork' => [
                    'uploaded[artwork]',
                    'mime_in[artwork,image/jpg,image/jpeg,image/png]',
                    'max_size[artwork, 1024]'
                ]
            ]);

            if($validate){

                if($image=$this->request->getFile('artwork')){

                    $dataPortfolio = $portfolio->where('id', $id)->first();

                    $route = ('../public/uploads/'.$dataPortfolio['artwork']);
                    unlink($route);

                    $newName=$image->getRandomName();
                    $image->move('../public/uploads/', $newName);

                    $data=['artwork'=>$newName ];
                    $portfolio->update($id, $data);
                }
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