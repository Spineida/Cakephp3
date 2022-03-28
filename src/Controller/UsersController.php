<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController{

    public function index(){
        $this->validateRole('index');
        $query = $this->Users->find('search', [
            'search' => $this->request->getQuery(),
            'contain' => ['Roles']
        ]);

        $users = $this->paginate($query);
        $roles = $this->Users->Roles->find('list');
        $this->set(compact('users', 'roles'));
    }

    public function profile($id = null){
        $this->validateRole('profile');
        $user = $this->Users->get($this->getCurrentUser()->id, [
            'contain' => ['Roles'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            unset($data['role_id']);
            unset($data['active']);
            unset($data['email']);

            if(empty(trim($data['password']))){
                unset($data['password']);
                unset($data['password_confirmation']);
            }

            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario fue actualizado correctamente.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error('Hubo un problema al actualizar el usuario, intente otra vez.');
        }

        $this->set('user', $user);
    }

    public function view($id = null){
        $this->validateRole('view');
        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set('user', $user);
    }

    public function add(){
        $this->validateRole('add');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario se correctamente.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Hubo un problema al guardar el usuario, intente otra vez.');
        }
        $roles = $this->Users->Roles->find('list');
        $this->set(compact('user', 'roles'));
    }

    public function edit($id = null){
        $this->validateRole('edit');
        $user = $this->Users->find()->where(['id' => $id])->first();

        if(empty($user)){
            $this->Flash->error(__('No existe registro en la base de datos.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            if(empty(trim($data['password']))){
                unset($data['password']);
                unset($data['password_confirmation']);
            }

            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario fue actualizado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Hubo un problema al actualizar el usuario, intente otra vez.');
        }
        $roles = $this->Users->Roles->find('list');
        $this->set(compact('user', 'roles'));
    }

    public function delete($id = null){
        $this->validateRole('delete');
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if($this->getCurrentUser()->id  == $user->id){
            $this->Flash->error('No se puede eliminar a si mismo.');
        }else{
            if ($this->Users->delete($user)) {
                $this->Flash->success('Usuario eliminado correctamente.');
            } else {
                $this->Flash->error('Hubo un error al eliminar el usuario, intente otra vez.');
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    public function changeStatus($id = null){
        $this->validateRole('changeStatus');
        if ($this->request->is(['post'])) {
            $user = $this->Users->get($id);
            if(empty($user)){
                $this->Flash->error('No existe registro en la base de datos.');
                return $this->redirect(['action' => 'index']);
            }

            $user->active = $user->active == 1 ? 0 : 1;
            if ($this->Users->save($user)) {
                $this->Flash->success('El estado de usuario fue cambiado correctamente.');
            }else{
                $this->Flash->error('Hubo un problema al cambiar el estado del usuario, intente otra vez.');
            }
        }
        
        return $this->redirect(['action' => 'index']);
    }

    public function validateRole($action){
        if(!$this->getPermission('Users', $action)){
            $this->Flash->error('No tiene acceso para ver la vista.');
            return $this->redirect(['action' => 'index']);
        }
    }

    public function login(){
        $this->viewBuilder()->setLayout('login');
        if($this->request->is('post')){
            $user = $this->Auth->identify();

            if($user && $user['active'] == 1){
                $this->Auth->setUser($user);
                $this->Flash->success('Has iniciado sesión correctamente.');

                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error('Correo electrónico o contraseña incorrectos. Por favor, intenta nuevamente.');
            }
        }
    }

    public function logout(){
        $this->Flash->success('Te has desconectado correctamente.');
        return $this->redirect($this->Auth->logout());
    }

}
