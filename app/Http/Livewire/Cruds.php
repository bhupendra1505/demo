<?php

namespace App\Http\Livewire;

use App\Models\Crud;
use Livewire\Component;

class Cruds extends Component
{
    public $first_name, $last_name, $email, $role,$cid;
    public $first_names, $last_names, $emails, $roles;
    public $isOpen = 0;
    public $updateModal = false;
    public $deleteModal = false;
    public $deleteId;
    public $users_role = [
        'Employee',
        'Admin'
    ]; 
    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function store()
    {
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:cruds,email',
            'role' => 'required',
        ]);

        Crud::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'role' => $this->role,
        ]);
        
        session()->flash('message','New User Successfully Created...');
        $this->isOpen = false;
        
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->role = '';
    }
    public function edit($id)
    {
        $this->updateModal = true;
        $crud = Crud::where('id',$id)->first();
        $this->first_names = $crud->first_name;
        $this->last_names = $crud->last_name;
        $this->emails = $crud->email;
        $this->roles = $crud->role;
        $this->cid =$id;
    }
    public function update(){
        $validatedDate = $this->validate([
            'first_names' => 'required',
            'last_names' => 'required',
            'emails' => 'required|string|email|max:255|unique:cruds,email,'.$this->cid,
            'roles' => 'required',
            
        ]);
        
        if ($this->cid) {
            $user = Crud::find($this->cid);
            $user->update([
                'first_name' =>$this->first_names,
                'last_name' => $this->last_names,
                'email' => $this->emails,
                'role' => $this->roles,
            ]);
            
            session()->flash('message', 'Users Updated Successfully.');
            $this->updateModal = false;
        }
    }
    public function deleteId($id)
    {
        $this->deleteModal = true;
        $this->deleteId = $id;

    }
    public function delete(){

        $did=$this->deleteId;
        Crud::find($did)->delete();
        session()->flash('message','User has been Successfully Deleted...');
        $this->deleteModal = false;
    }
    public function render()
    {
        $user=Crud::all();
        return view('livewire.cruds')->with(['users' => $user]);
    }
}
