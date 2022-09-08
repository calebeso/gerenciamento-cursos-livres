<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function register()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'cpf' => 'cpf',
        ];

        $messages = [
            'email.email' => 'O campo e-mail deve conter um e-mail válido',
            'cpf.cpf' => 'O campo CPF deve ser preenchido com um CPF válido',
        ];

        $validate = Validator::make($request->all(), $rules, $messages);
        
        if($validate->fails()){
            return redirect()->back()->with('error', $validate->errors()->first());
        }

        $data = User::findOrFail($id);
        $data->update($request->except(['_method', '_token', 'role']));
        $roles = $request->input('role') ? $request->input('role') : [];

        $data->syncRoles($roles);

        return redirect('/usuarios')->with('success', 'Usuário atualizado');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'cpf' => 'required|cpf',
            'rg'  => 'required', 
            'telefone' => 'required',
            'endereco' => 'required',
            'role' => 'required'
        ];

        $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.unique' => 'Já existe um registro com o mesmo e-mail',
            'password.required' => 'O campo senha é obrigatório',
            'password.confirmed' => 'As senhas não combinam',
            'password.min' => 'O campo senha deve ter ao menos 6 caractéres',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.cpf' => 'O campo CPF deve ser preenchido com um CPF válido',
            'rg.required' => 'O campo RG é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'endereco.required' => 'O campo endereço é obrigatório',
            'role.required' => 'O campo permissão é obrigatório',
        ];

        $validate = Validator::make($request->all(), $rules, $messages);
        
        if($validate->fails()){
            return redirect()->back()->with('error', $validate->errors()->first());
        }

        $data = User::create($request->all());
        $roles = $request->input('role') ? $request->input('role') : [];

        $data->syncRoles($roles);
        
        return redirect('/usuarios')->with('success', 'Novo usuário cadastrado');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        
        if($user->exists())
        {
            $user->delete();
            return redirect('/usuarios')->with('success', 'Usuário removido');
        }
    }
}
