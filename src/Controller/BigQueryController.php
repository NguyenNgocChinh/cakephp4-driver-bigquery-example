<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class BigQueryController extends AppController
{
    protected $USER_MODEL;

    public function initialize(): void
    {
        parent::initialize();
        $this->USER_MODEL = TableRegistry::get('User');
    }

    /**
     * List all
     */
    public function index()
    {
        $selects = [];


        $users = $this->USER_MODEL->find(
            'all',
            [
                'order' => ['id' => 'DESC']
            ]
        );

        // $users->select(['count' => $users->func()->count('*')]);

        $users->select($selects)->limit(2)->page(1);

        dd($users->toList());
    }

    /**
     * FindBy
     */
    public function find($column, $value)
    {
        $user = $this->USER_MODEL->{"findBy". $column}($value)->all();
        dd($user);
    }

    /**
     * Add a new
     */
    public function add()
    {
        $data = [
            'id' => Text::uuid(),
            'name' => 'John Doe',
            'email' => 'john.doe@example.com'
        ];
    
        $user = $this->USER_MODEL->newEmptyEntity();
        $user = $this->USER_MODEL->patchEntity($user, $data);
        $this->USER_MODEL->save($user);

        dd($user);
    }

    /**
     * Read a view log
     */
    public function detail($id)
    {
        // $user = $this->USER_MODEL->get($id);
        // dd($user);

        // $user = $this->USER_MODEL->find('all')->where(['id'=>$id])->first();
        // dd($user);

        // use finder (findById) to get
        $user = $this->USER_MODEL->findById($id)->first();

        dd($user);
    }

    /**
     * Update the log
     */
    public function update($id)
    {
        $user = $this->USER_MODEL->get($id);
        $user->name = 'name update';

        $this->USER_MODEL->save($user);
        dd($user);
    }

    /**
     * Update the log
     */
    public function delete($id)
    {
        $entity = $this->USER_MODEL->get($id);
        if ($this->USER_MODEL->delete($entity)) {
            dd("DONE");
        } else {
            dd("FAILED");
        }
    }
}
