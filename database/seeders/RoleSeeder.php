<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'administrator' => Role::create(['name' => 'administrator']),
            'stock_manager' => Role::create(['name' => 'stock_manager']),
            'stock_operator' => Role::create(['name' => 'stock_operator']),
            'financial_manager' => Role::create(['name' => 'financial_manager']),
            'supplier' => Role::create(['name' => 'supplier']),
            'auditor' => Role::create(['name' => 'auditor']),
        ];

        $permissions = [
            'manage_users' => Permission::create(['name' => 'manage_users']),
            'manage_roles_and_permissions' => Permission::create(['name' => 'manage_roles_and_permissions']),
            'manage_global_configs' => Permission::create(['name' => 'manage_global_configs']),
            'manage_personal_configs' => Permission::create(['name' => 'manage_personal_configs']),
            'view_general_reports' => Permission::create(['name' => 'view_general_reports']),

            'manage_stock_items' => Permission::create(['name' => 'manage_stock_items']),
            'manage_stock_movements' => Permission::create(['name' => 'manage_stock_movements']),
            'manage_stock_categories' => Permission::create(['name' => 'manage_stock_categories']),
            'view_stock_basic_reports' => Permission::create(['name' => 'view_stock_basic_reports']),
            'view_stock_advanced_reports' => Permission::create(['name' => 'view_stock_advanced_reports']),

            'view_financial_reports' => Permission::create(['name' => 'view_financial_reports']),
            'change_items_price' => Permission::create(['name' => 'change_items_price']),

            //Implementação futura.
            'view_items_orders' => Permission::create(['name' => 'view_items_orders']),
            'send_orders_delivery' => Permission::create(['name' => 'send_orders_delivery']),
        ];

        //Atribuindo permissões do admin.
        foreach ($permissions as $name => $permission) {
            $roles['administrator']->givePermissionTo($permission);
        }

        //Atribuindo permissões do gerente de estoque.
        $roles['stock_manager']->givePermissionTo($permissions['manage_stock_items']);
        $roles['stock_manager']->givePermissionTo($permissions['manage_stock_movements']);
        $roles['stock_manager']->givePermissionTo($permissions['manage_stock_categories']);
        $roles['stock_manager']->givePermissionTo($permissions['view_stock_basic_reports']);
        $roles['stock_manager']->givePermissionTo($permissions['view_stock_advanced_reports_reports']);
        $roles['stock_manager']->givePermissionTo($permissions['manage_personal_configs']);

        //Atribuindo permissões do operador de estoque.
        $roles['stock_operator']->givePermissionTo($permissions['manage_stock_movements']);
        $roles['stock_operator']->givePermissionTo($permissions['view_stock_basic_reports']);
        $roles['stock_operator']->givePermissionTo($permissions['manage_personal_configs']);

        //Atribuindo permissões do gerente financeiro.
        $roles['financial_manager']->givePermissionTo($permissions['view_financial_reports']);
        $roles['financial_manager']->givePermissionTo($permissions['change_items_price']);
        $roles['financial_manager']->givePermissionTo($permissions['manage_personal_configs']);

        //Atrbuindo permissões do fornecedor.
        $roles['supplier']->givePermissionTo($permissions['view_items_orders']);
        $roles['supplier']->givePermissionTo($permissions['send_orders_delivery']);
        $roles['supplier']->givePermissionTo($permissions['manage_personal_configs']);

        //Atrbuindo permissões do auditor.
        $roles['auditor']->givePermissionTo($permissions['view_stock_basic_reports']);
        $roles['auditor']->givePermissionTo($permissions['view_stock_advanced_reports']);
        $roles['auditor']->givePermissionTo($permissions['manage_personal_configs']);
    }
}
