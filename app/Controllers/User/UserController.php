<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Exception;

class UserController extends BaseController
{
    private $users;   

    public function __construct()
    {
        $this->users = new UserModel();
    }
    public function index()
    {
        $data = [
            'users' => $this->users->findAll(),
            'title' => 'Listar usuários',
            'button' => anchor('/user/new', 'Adicionar Usuário', ['class' => 'btn btn-primary btn-lg'])
        ];

        return view('user/list', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Adicionar usuários',
            'button' => anchor('/user', 'Listar Usuário', ['class' => 'btn btn-primary btn-lg'])

        ];
        return view('user/new', $data);
    }

    public function edit(int $id)
    {

        $data = [
            'title' => 'Editar usuário',
            'user' => $this->users->find($id),
            'button' => anchor('/user', 'Listar Usuário', ['class' => 'btn btn-primary btn-lg'])


        ];
        return view('user/edit', $data);
    }

    public function show(int $id)
    {
        try {

            $data = $this->users->select('id, name, email')->find($id);
            return $this->response->setJSON($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function create()
    {

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/user');
        }

        $rules = [
            'name'        => 'required|min_length[3]',
            'email'        => 'required|valid_email|is_unique[users.email]',
            'password'        => 'required|min_length[3]',
        ];
        $messages = [
            'name'        => [
                'required' => $this->message['required'],
                'min_length' => $this->message['min_length'],
            ],
            'email'        => [
                'required' => $this->message['required'],
                'is_unique' => $this->message['is_unique']
            ],
            'password'        => [
                'required' => $this->message['required'],
                'min_length' => $this->message['min_length'],
            ],
        ];

        $validated = $this->validate($rules, $messages);

        if (!$validated) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['password'] = $password;

        $save = $this->users->save($data);
       

        if ($save) {
            session()->setFlashdata([
                'message' => 'Operação realizada com sucesso!',
                'type' => 'success',
                'greeting' => 'Parabéns! '
            ]);
            return redirect()->to('/user');
        }

        session()->setFlashdata([
            'message' => 'Ocorreu um erro inesperado!',
            'type' => 'danger',
            'greeting' => 'Ops! '
        ]);
        return redirect()->to('/user');
    }
    public function update($id)
    {
        $rules = [
            'id'    => 'is_natural_no_zero',
            'name'        => 'required|min_length[3]',
            'email'        => 'required|valid_email|is_unique[users.email,id,{id}]',
            'password'        => 'required|min_length[3]',
        ];
        $messages = [
            'name'        => [
                'required' => $this->message['required'],
                'min_length' => $this->message['min_length'],
            ],
            'email'        => [
                'required' => $this->message['required'],
                'is_unique' => $this->message['is_unique']
            ],
            'password'        => [
                'required' => $this->message['required'],
                'min_length' => $this->message['min_length'],
            ],
        ];

        $validated = $this->validate($rules, $messages);

        if (!$validated) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['password'] = $password;

        $save = $this->users->save($data);

        if ($save) {
            session()->setFlashdata([
                'message' => 'Operação realizada com sucesso!',
                'type' => 'success',
                'greeting' => 'Parabéns! '
            ]);

            return redirect()->to('/user');
        }

        session()->setFlashdata([
            'message' => 'Ocorreu um erro inesperado!',
            'type' => 'danger',
            'greeting' => 'Ops! '
        ]);
        return redirect()->to('/user');
    }
    public function delete($id)
    {

        $delete = $this->users->delete($id);
        if ($delete) {
            session()->setFlashdata([
                'message' => 'Operação realizada com sucesso!',
                'type' => 'success',
                'greeting' => 'Parabéns! '
            ]);
            return redirect()->to('/user');
        }
    }
}
