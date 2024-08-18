<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Symbols Controller
 *
 * @property \App\Model\Table\SymbolsTable $Symbols
 */
class SymbolsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Symbols->find()
            ->contain(['Exchanges']);
        $symbols = $this->paginate($query);

        $this->set(compact('symbols'));
    }

    /**
     * View method
     *
     * @param string|null $id Symbol id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $symbol = $this->Symbols->get($id, contain: ['Exchanges']);
        $this->set(compact('symbol'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $symbol = $this->Symbols->newEmptyEntity();
        if ($this->request->is('post')) {
            $symbol = $this->Symbols->patchEntity($symbol, $this->request->getData());
            if ($this->Symbols->save($symbol)) {
                $this->Flash->success(__('The symbol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symbol could not be saved. Please, try again.'));
        }
        $exchanges = $this->Symbols->Exchanges->find('list', limit: 200)->all();
        $this->set(compact('symbol', 'exchanges'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Symbol id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $symbol = $this->Symbols->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symbol = $this->Symbols->patchEntity($symbol, $this->request->getData());
            if ($this->Symbols->save($symbol)) {
                $this->Flash->success(__('The symbol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symbol could not be saved. Please, try again.'));
        }
        $exchanges = $this->Symbols->Exchanges->find('list', limit: 200)->all();
        $this->set(compact('symbol', 'exchanges'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Symbol id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $symbol = $this->Symbols->get($id);
        if ($this->Symbols->delete($symbol)) {
            $this->Flash->success(__('The symbol has been deleted.'));
        } else {
            $this->Flash->error(__('The symbol could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
