<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\CreditModel;
use App\Models\MaritalModel;

class CreditController extends BaseController
{
    // Add a new credit for a client page
    public function create()
    {
        $clientModel = new ClientModel();
        $data['clients'] = $clientModel->findAll();
        return view('add_credits', $data);
    }
    // Add a new credit for a specific client
    public function createForClient($id)
    {
        $clientModel = new ClientModel();
        $data['client'] = $clientModel->find($id);
        return view('add_credits', $data);
    }
    
    // After submitting the form to add a new credit
    public function formValidation() {
        helper(['form', 'url']);

        $input = $this->validate([
            'organization' => 'required|min_length[4]',
            'amount' => 'required|numeric|max_length[10]',
            'idClient' => 'required|numeric'
        ]); 

        $creditModel = new CreditModel();
        $clientModel = new ClientModel();
        $data['clients'] = $clientModel->findAll();
        $clientid = intval($this->request->getPost('idClient'));
        $data['organization'] = $this->request->getPost('organization');
        $data['amount'] = $this->request->getPost('amount');

        if (!$input) {
            return view('add_credits', $data, [
                'validation' => $this->validator
            ]);
        } else { 
            $creditModel->save([
                'organization' => $data['organization'],
                'amount'  => $data['amount'],
                'idClient'  => $clientid 
            ]);          
            return $this->response->redirect(base_url('/view/'.$clientid));
        }
    }
    
    // delete a credit
    public function delete($clientid,$creditid)
    {
        $creditModel = new CreditModel();
        $creditModel->delete($creditid);
        return $this->response->redirect(base_url('/view/'.$clientid));
    }

    // edit a credit
    public function edit($clientid,$creditid)
    {
        $clientModel = new ClientModel();
        $data['client'] = $clientModel->find($clientid);
        $creditModel = new CreditModel();
        $data['credit'] = $creditModel->find($creditid);
        return view('edit_credits', $data);
    }
    
    // After submitting the form to add a new credit
    public function updateCredit() {
        helper(['form', 'url']);
        
        $creditModel = new CreditModel();
        $creditid = intval($this->request->getPost('idCredit'));
        $clientid = intval($this->request->getPost('idClient'));

        $clientModel = new ClientModel();
        $data['client'] = $clientModel->find($clientid);
        $data['credit'] = $creditModel->find($creditid);

        $input = $this->validate([
            'organization' => 'required|min_length[4]',
            'amount' => 'required|numeric|max_length[10]',
            'idClient' => 'required|numeric'
        ]); 
        
        if (!$input) {
            return view('edit_credits', $data, [
                'validation' => $this->validator
            ]);
        } else { 
            $creditModel->update($creditid, [
                'organization' => $this->request->getPost('organization'),
                'amount'  => $this->request->getPost('amount'),
                'idClient'  => $clientid
            ]);          
            return $this->response->redirect(base_url('/view/'.$clientid));
        }
    }
}