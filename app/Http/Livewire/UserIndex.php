<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserIndex extends Component
{
    public $users, $fullName, $phone_number, $email, $updated_id, $deleted_id, $password, $password_confirmation, $role, $address;
    protected $rules = [
        'fullName' => 'required',

        'email' => 'required|unique:users,email',
        'phone_number' => 'required|unique:users,phone_number',
        'password' => 'sometimes|required|min:4|confirmed',
        'password_confirmation' => 'sometimes|required',
        'role' => '',
        'address' => 'required',

    ];

    public function statusApprove($id)
    {

        $status;
        $user = User::where('id', $id)->first();
        $status = $user->status;
        $user->status = 1;
        $user->save();
        $this->dispatchBrowserEvent('successfully_added', ['newName' => "Successfully Approved"]);

    }
    public function statusUnApproved($id)
    {

        $status;
        $user = User::where('id', $id)->first();
        $status = $user->status;
        $user->status = 0;
        $user->save();
        $this->dispatchBrowserEvent('successfully_added', ['newName' => "Successfully Blocked"]);

    }

    public function addUser()
    {

        $this->validate();
        $user = new User();
        $user->full_name = $this->fullName;
        $user->email = $this->email;
        $user->phone_number = $this->phone_number;
        $user->password = Hash::make($this->password);
        $user->role = $this->role;
        $user->status = true;
        $user->address = $this->address;

        if ($user->save()) {
            $this->dispatchBrowserEvent('successfully_added', ['newName' => "Successfully Added"]);
            $this->mount();
        }
    }
    public function Edit_user($id)
    {

        $this->updated_id = $id;

        $user = User::find($id);
        $this->fullName = $user->full_name;
        $this->phone_number = $user->phone_number;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->address = $user->address;

    }

    public function Updated_user()
    {

        $user = User::find($this->updated_id);
        $user->full_name = $this->fullName;
        $user->phone_number = $this->phone_number;
        $user->address = $this->address;
        $user->role = $this->role;
        $user->email = $this->email;

        $user->save();
        $this->dispatchBrowserEvent('successfully_added', ['newName' => "Successfully Updated"]);
        $this->reset();
        $this->mount();

    }

    public function deleted_id($id)
    {
        $this->deleted_id = $id;
        $this->dispatchBrowserEvent('deleted_confirm_modal', ['newName' => "Successfully Added"]);
    }
    public function detedUser()
    {
        $user = User::find($this->deleted_id);
        $user->delete();
        $this->dispatchBrowserEvent('delete_toast', ['newName' => "User is Successfully Deleted"]);
        $this->mount();

    }
    public function mount()
    {
        $this->users = User::latest()->get();

    }
    public function render()
    {
        return view('livewire.user-index');
    }
}