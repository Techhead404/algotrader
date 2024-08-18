<?php
namespace App\Controller;

class ExchangesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        //$this->loadComponent('Paginator'); Breaks the app
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $exchanges = $this->paginate($this->Exchanges);
        $this->set(compact('exchanges'));
    }

    public function add(){
        $exchange = $this->Exchanges->newEmptyEntity();
        if ($this->request->is('post')) {
            $exchange = $this->Exchanges->patchEntity($exchange, $this->request->getData());
            if ($this->Exchanges->save($exchange)) {
                $this->Flash->success(__('The exchange has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exchange could not be saved. Please, try again.'));
        }
        $this->set(compact('exchange'));
    }

    public function edit($id = null)
    {
        $exchange = $this->Exchanges->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Exchanges->patchEntity($exchange, $this->request->getData());
            if ($this->Exchanges->save($exchange)) {
                $this->Flash->success(__('The exchange has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exchange could not be saved. Please, try again.'));
        }

        $this->set(compact('exchange'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $exchange = $this->Exchanges->get($id);
        if ($this->Exchanges->delete($exchange)) {
            $this->Flash->success(__('The exchange has been deleted.'));
        } else {
            $this->Flash->error(__('The exchange could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

?>