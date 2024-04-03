<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModoroM;

class Modoro extends BaseController
{
    protected $ModoroM;
    
    public function __construct()
    {
        $this->ModoroM = new ModoroM();
    }

    public function home()
    {
        $paget = \Config\Services::pager();

        $modoro = $this->ModoroM->paginate(8);

        $data = [
            'modoro' => $modoro,
            'pager' => $this->ModoroM->pager,
        ];
        return view('modoro/home', $data);
    }

     public function index()
    {

        return view('modoro/index');
    }


    public function pilih($id = null)
    {
        $level = $this->request->getPost('level');
        $id = $this->request->getGet('id');

        $data = [
            'level' => $this->request->getVar('level'),
            'feature'=>'',
            'work_time' => '',
            'break_time' =>  '',
        ];
        $this->ModoroM->insert($data);
        $modoro = $this->ModoroM->getInsertID();

        return redirect()->to('/modoro/ ' . $modoro);


    }
    public function modoro($id)
    {
        $modoro = $this->ModoroM->where(['id'=> $id])->first();

         if (!empty($modoro)) {
            if ($modoro['level'] == 'newcomer') {
                $break = $modoro['work_time'] * 35 / 100;
            }
            if ($modoro['level'] == 'reguler') {
                $break = $modoro['work_time'] * 28 / 100;
               
            }
            if ($modoro['level'] == 'enthusiast') {
                $break = $modoro['work_time'] * 20 / 100;
            }
        }

        $data = [
            'modoro' => $modoro,
            'break' => $break,
        ];

        return view('modoro/index', $data);
    }
    
    public function tambah($id){

        $data = [
            'id' => $id,
            'feature' => $this->request->getVar('feature'),
        ];
        $this->ModoroM->save($data);

        return redirect()->to('/modoro/'. $id);

    }

    public function hasil($id){
        $modoro = $this->ModoroM->where(['id'=> $id])->first();
        $data = [
            'id' => $id,
            'work_time' => $this->request->getVar('work'),
          ];
            
        $this->ModoroM->save($data);
        return redirect()->to('/modoro/'. $id);
    }

}
