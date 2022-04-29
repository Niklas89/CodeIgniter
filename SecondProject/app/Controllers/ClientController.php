<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\CreditModel;
use App\Models\MaritalModel;

class ClientController extends BaseController
{
    // show a list of all clients
    public function index()
    {
        $clientModel = new ClientModel();
        $data['clients'] = $clientModel->findAll();
        $data['title'] = 'Tous les clients';
        return view('list_clients', $data);
    }

    // Add a new client page
    public function create()
    {
        $maritalModel = model(MaritalModel::class);
        $data['maritalstatus'] = $maritalModel->findAll();
        return view('add_clients', $data);
    }
    
    // After submitting the form to add a new client
    public function formValidation() {
        helper(['form', 'url']);

        $input = $this->validate([
            'lastname' => 'required|min_length[4]',
            'firstname' => 'required|min_length[4]',
            'birthdate' => 'required|min_length[4]',
            'address' => 'required|min_length[10]',
            'postalcode' => 'required|numeric|max_length[5]',
            'phone' => 'required|numeric|max_length[10]',
            'idMaritalStatus' => 'required|numeric'
        ]); 

        $clientModel = new ClientModel();
        $data['lastname'] = $this->request->getPost('lastname');
        $data['firstname'] = $this->request->getPost('firstname');
        $data['birthdate'] = $this->request->getPost('birthdate');
        $data['address'] = $this->request->getPost('address');
        $data['postalcode'] = $this->request->getPost('postalcode');
        $data['phone'] = $this->request->getPost('phone');

        $maritalModel = model(MaritalModel::class);
        $data['maritalstatus'] = $maritalModel->findAll();

        if (!$input) {
            return view('add_clients', $data, [
                'validation' => $this->validator
            ]);
        } else { 
            $clientModel->save([
                'lastname' => $data['lastname'],
                'firstname'  => $data['firstname'],
                'birthdate'  => $data['birthdate'],
                'address'  => $data['address'],
                'postalcode'  => $data['postalcode'],
                'phone'  => $data['phone'],
                'idMaritalStatus'  => intval($this->request->getPost('idMaritalStatus'))
            ]);          
           return $this->response->redirect(base_url('/'));
        }
    }
    
    // delete a client
    public function delete($id)
    {
        $clientModel = new ClientModel();
        $creditModel = new CreditModel();
        $clientModel->delete($id);
        $creditModel->where($id.' = credit.idClient')->delete();
        return $this->response->redirect(base_url('/'));
    }

    // edit a client
    public function edit($id)
    {
        $clientModel = new ClientModel();
        $data['clients'] = $clientModel->find($id);
        $maritalModel = model(MaritalModel::class);
        $data['maritalstatus'] = $maritalModel->findAll();
        return view('edit_clients', $data);
    }
    
    // // After submitting the form to edit a client
    public function updateClient()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'lastname' => 'required|min_length[4]',
            'firstname' => 'required|min_length[4]',
            'birthdate' => 'required|min_length[4]',
            'address' => 'required|min_length[10]',
            'postalcode' => 'required|numeric|max_length[5]',
            'phone' => 'required|numeric|max_length[10]',
            'idMaritalStatus' => 'required|numeric'
        ]); 

        $clientModel = new ClientModel();
        $clientid = intval($this->request->getPost('idClient'));
        $data['clients'] = $clientModel->find($clientid);
        $maritalModel = model(MaritalModel::class);
        $data['maritalstatus'] = $maritalModel->findAll();
        $creditModel = new CreditModel();
        $data['credits'] = $creditModel->where($clientid.' = credit.idClient')->findAll();

        if (!$input) {
            return view('view_clients', $data, [
                'validation' => $this->validator
            ]);
        } else { 
            $clientModel->update($clientid, [
                'lastname' => $this->request->getPost('lastname'),
                'firstname'  => $this->request->getPost('firstname'),
                'birthdate'  => $this->request->getPost('birthdate'),
                'address'  => $this->request->getPost('address'),
                'postalcode'  => $this->request->getPost('postalcode'),
                'phone'  => $this->request->getPost('phone'),
                'idMaritalStatus'  => intval($this->request->getPost('idMaritalStatus'))
            ]);          
            return $this->response->redirect(base_url('/view/'.$clientid));
        }
    } 

    // view the details of a client
    public function view($id)
    {
        $clientModel = new ClientModel();
        $data['clients'] = $clientModel->find($id);
        $maritalModel = model(MaritalModel::class);
        $data['maritalstatus'] = $maritalModel->findAll();
        $creditModel = new CreditModel();
        $data['credits'] = $creditModel->where($id.' = credit.idClient')->findAll();
        // $data['clients'] = $clientModel->join('maritalstatus','maritalstatus.idMaritalStatus = client.idMaritalStatus')->findAll();
        return view('view_clients', $data);
    }

}