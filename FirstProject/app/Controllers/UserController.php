<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ServiceModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $serviceModel = model(serviceModel::class);
        $data['services'] = $serviceModel->findAll();
        $data['users'] = $userModel->join('service','service.serviceid = user.id_service')->findAll();
        $data['title'] = 'All users';
        return view('list_users', $data);
    }

    public function create()
    {
        $serviceModel = model(serviceModel::class);

        $data['services'] = $serviceModel->findAll();
        return view('add_users', $data);
    }

    public function formValidation() {
        helper(['form', 'url']);

        $input = $this->validate([
            'lastname' => 'required|min_length[4]',
            'firstname' => 'required|min_length[4]',
            'birthdate' => 'required|min_length[4]',
            'address' => 'required|min_length[10]',
            'postalcode' => 'required|numeric|max_length[5]',
            'phone' => 'required|numeric|max_length[10]',
            'id_service' => 'required|numeric'
        ]); 

        $userModel = new UserModel();

        if (!$input) {
            echo view('add_users', [
                'validation' => $this->validator
            ]);
        } else { 
            $userModel->save([
                'lastname' => $this->request->getPost('lastname'),
                'firstname'  => $this->request->getPost('firstname'),
                'birthdate'  => $this->request->getPost('birthdate'),
                'address'  => $this->request->getPost('address'),
                'postalcode'  => $this->request->getPost('postalcode'),
                'phone'  => $this->request->getPost('phone'),
                'id_service'  => intval($this->request->getPost('id_service'))
            ]);          
           // return $this->response->redirect(site_url('/'));
           echo view('success');
        }
    }

    public function delete($id)
    {
        $userModel = new UserModel();

        $userModel->delete($id);

        $serviceModel = model(serviceModel::class);
        $data['services'] = $serviceModel->findAll();
        $data['users'] = $userModel->join('service','service.serviceid = user.id_service')->findAll();
        $data['title'] = 'All users';

        return view('list_users', $data);
    }

    public function select($id)
    {
        $userModel = new UserModel();
        $serviceModel = model(serviceModel::class);
        $data['services'] = $serviceModel->findAll();
        if($id == 0) {
            $data['users'] = $userModel->join('service', 'service.serviceid = user.id_service')->findAll();
            $data['title'] = 'All users';
        } else {
            $data['users'] = $userModel->join('service', 'service.serviceid = user.id_service')->where('serviceid',$id)->findAll();
            $data['title'] = 'Users with selected services';
        }
        return view('list_users', $data);
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->find($id);
        $serviceModel = model(serviceModel::class);
        $data['services'] = $serviceModel->findAll();
        return view('edit_users', $data);
    }

    public function updateUser()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'lastname' => 'required|min_length[4]',
            'firstname' => 'required|min_length[4]',
            'birthdate' => 'required|min_length[4]',
            'address' => 'required|min_length[10]',
            'postalcode' => 'required|numeric|max_length[5]',
            'phone' => 'required|numeric|max_length[10]',
            'id_service' => 'required|numeric'
        ]); 

        $userModel = new UserModel();

        if (!$input) {
            echo view('edit_users', [
                'validation' => $this->validator
            ]);
        } else { 
            $userModel->update($this->request->getPost('userid'), [
                'lastname' => $this->request->getPost('lastname'),
                'firstname'  => $this->request->getPost('firstname'),
                'birthdate'  => $this->request->getPost('birthdate'),
                'address'  => $this->request->getPost('address'),
                'postalcode'  => $this->request->getPost('postalcode'),
                'phone'  => $this->request->getPost('phone'),
                'id_service'  => intval($this->request->getPost('id_service'))
            ]);          
           // return $this->response->redirect(site_url('/'));
           echo view('success');
        }

    }
}