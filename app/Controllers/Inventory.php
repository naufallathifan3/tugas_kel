<?php

namespace App\Controllers;

use App\Models\InventoryModel;

class Inventory extends BaseController
{
    protected $inventoryModel;

    public function __construct()
    {
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        return view('inventory/index');
    }

    public function rekap()
    {
        return view('inventory/rekap');
    }

        public function getItems()
    {
        $items = $this->inventoryModel->findAll();
        return $this->response->setJSON($items);
    }


    public function saveItem()
    {
        $id = $this->request->getPost('itemId'); // Ubah menjadi itemId untuk membedakan dari 'id' biasa
        $data = [
            'name' => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('quantity'),
            'description' => $this->request->getPost('description')
        ];

        if ($id) {
            $this->inventoryModel->update($id, $data);
        } else {
            $this->inventoryModel->insert($data);
        }

        return $this->response->setJSON(['success' => true]);
    }

    public function deleteItem()
    {
        $id = $this->request->getPost('id');
        $this->inventoryModel->delete($id);
        return $this->response->setJSON(['success' => true]);
    }


}
