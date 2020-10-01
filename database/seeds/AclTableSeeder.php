<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\User;

class AclTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'name'=> 'admin',
            'label' => 'Admistrador do sistema'
        ]);

        $roleGerenciador = Role::create([
            'name'=> 'gerenciador',
            'label' => 'Admistrador do sistema'
        ]);

        $roleEditor = Role::create([
            'name'=> 'editor',
            'label' => 'Editor do Sistema'
        ]);
        $roleCliente = Role::create([
            'name'=> 'cliente',
            'label' => 'Cliente do Sistema'
        ]);

        $user = User::create([
            'name'=> 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);

        $user->roles()->attach($roleEditor);

        $items = [

            //['name' => 'access', 'label' => 'Acessar'],
            //['name' => 'create', 'label' => 'Cadastrar'],
            //['name' => 'edit', 'label' => 'Editar'],
            //['name' => 'view', 'label' => 'Ver'],
            //['name' => 'delete', 'label' => 'Deletar'],
            ['name' => 'permission_access', 'label' => 'Acessar permissões'],
            ['name' => 'permission_create', 'label' => 'Cadastrar permissões'],
            ['name' => 'permission_edit', 'label' => 'Editar permissões'],
            ['name' => 'permission_view', 'label' => 'Ver permissões'],
            ['name' => 'permission_delete', 'label' => 'Deletar permissões'],
            ['name' => 'role_access', 'label' => 'Acessar regras'],
            ['name' => 'role_create', 'label' => 'Cadastrar regras'],
            ['name' => 'role_edit', 'label' => 'Editar regras'],
            ['name' => 'role_view', 'label' => 'Ver regras'],
            ['name' => 'role_delete', 'label' => 'Deletar regras'],
            ['name' => 'empresa_access', 'label' => 'Acessar empresas'],
            ['name' => 'empresa_create', 'label' => 'Cadastrar empresas'],
            ['name' => 'empresa_edit', 'label' => 'Editar empresas'],
            ['name' => 'empresa_view', 'label' => 'Ver empresas'],
            ['name' => 'empresa_delete', 'label' => 'Deletar empresas'],
            ['name' => 'user_access', 'label' => 'Acessar usuários'],
            ['name' => 'user_create', 'label' => 'Cadastrar usuários'],
            ['name' => 'user_edit', 'label' => 'Editar usuários'],
            ['name' => 'user_view', 'label' => 'Ver usuários'],
            ['name' => 'user_delete', 'label' => 'Deletar usuários'],
            ['name' => 'configuracao_access', 'label' => 'Acessar configurações'],
            ['name' => 'configuracao_create', 'label' => 'Cadastrar configurações'],
            ['name' => 'configuracao_edit', 'label' => 'Editar configurações'],
            ['name' => 'configuracao_view', 'label' => 'Ver configurações'],
            ['name' => 'configuracao_delete', 'label' => 'Deletar configurações'],
            ['name' => 'pessoa_access', 'label' => 'Acessar pessoas'],
            ['name' => 'pessoa_create', 'label' => 'Cadastrar pessoas'],
            ['name' => 'pessoa_edit', 'label' => 'Editar pessoas'],
            ['name' => 'pessoa_view', 'label' => 'Ver pessoas'],
            ['name' => 'pessoa_delete', 'label' => 'Deletar pessoas'],
            ['name' => 'aplicacao_access', 'label' => 'Acessar aplicações'],
            ['name' => 'aplicacao_create', 'label' => 'Cadastrar aplicações'],
            ['name' => 'aplicacao_edit', 'label' => 'Editar aplicações'],
            ['name' => 'aplicacao_view', 'label' => 'Ver aplicações'],
            ['name' => 'aplicacao_delete', 'label' => 'Deletar aplicações'],
            ['name' => 'aporte_access', 'label' => 'Acessar aportes'],
            ['name' => 'aporte_create', 'label' => 'Cadastrar aportes'],
            ['name' => 'aporte_edit', 'label' => 'Editar aportes'],
            ['name' => 'aporte_view', 'label' => 'Ver aportes'],
            ['name' => 'aporte_delete', 'label' => 'Deletar aportes'],
            ['name' => 'aporte_active', 'label' => 'Ativar aportes'],
            ['name' => 'garantia_access', 'label' => 'Acessar garantias'],
            ['name' => 'garantia_create', 'label' => 'Cadastrar garantias'],
            ['name' => 'garantia_edit', 'label' => 'Editar garantias'],
            ['name' => 'garantia_view', 'label' => 'Ver garantias'],
            ['name' => 'garantia_delete', 'label' => 'Deletar garantias'],
            ['name' => 'admin_access', 'label' => 'Acessar painel administrativo'],
            ['name' => 'basico_access', 'label' => 'Acessar painel basico'],
            ['name' => 'financeiro_access', 'label' => 'Acessar painel financeiro'],
            ['name' => 'cliente_painel', 'label' => 'Acessar painel do cliente'],
            ['name' => 'cliente_aporte', 'label' => 'Acessar aportes do cliente'],
            ['name' => 'cliente_extrato', 'label' => 'Acessar extrato do cliente'],
            ['name' => 'investimento_access', 'label' => 'Acessar investimentos'],
            ['name' => 'investimento_create', 'label' => 'Cadastrar investimentos'],
            ['name' => 'investimento_edit', 'label' => 'Editar investimentos'],
            ['name' => 'investimento_view', 'label' => 'Ver investimentos'],
            ['name' => 'investimento_delete', 'label' => 'Deletar investimentos'],
            ['name' => 'fundo_investimento_access', 'label' => 'Acessar fundo de investimentos'],
            ['name' => 'fundo_investimento_create', 'label' => 'Cadastrar fundo de investimentos'],
            ['name' => 'fundo_investimento_edit', 'label' => 'Editar fundo de investimentos'],
            ['name' => 'fundo_investimento_view', 'label' => 'Ver fundo de investimentos'],
            ['name' => 'fundo_investimento_delete', 'label' => 'Deletar fundo de investimentos'],
            ['name' => 'despesa_access', 'label' => 'Acessar despesas'],
            ['name' => 'despesa_create', 'label' => 'Cadastrar despesas'],
            ['name' => 'despesa_edit', 'label' => 'Editar despesas'],
            ['name' => 'despesa_view', 'label' => 'Ver despesas'],
            ['name' => 'despesa_delete', 'label' => 'Deletar despesas'],
            ['name' => 'tipodespesa_access', 'label' => 'Acessar tipos de despesas'],
            ['name' => 'tipodespesa_create', 'label' => 'Cadastrar tipos de despesas'],
            ['name' => 'tipodespesa_edit', 'label' => 'Editar tipos de despesas'],
            ['name' => 'tipodespesa_view', 'label' => 'Ver tipos de despesas'],
            ['name' => 'tipodespesa_delete', 'label' => 'Deletar tipos de despesas'],

        ];

        foreach ($items as $id=>$item) {
            $permssion = Permission::create($item);
            if ($id > 24){
                $roleEditor->permissions()->attach($permssion);
            }
            if (strpos( $permssion->name, 'cliente_') > 0){
                $roleCliente->permissions()->attach($permssion);
            }
            $roleGerenciador->permissions()->attach($permssion);
        }


        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);

    }

}
