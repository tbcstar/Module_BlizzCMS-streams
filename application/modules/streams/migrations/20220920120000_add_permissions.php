<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_permissions extends CI_Migration
{
    public function up()
    {
        $this->permission_model->insert_batch([
            ['key' => 'view.streams', 'module' => 'streams', 'description' => 'Can view streams page']
        ]);

        $permissions = $this->permission_model->find_all(['module' => 'streams']);
        $permsLinked = [];

        foreach ($permissions as $permission) {
            $permsLinked[] = ['role_id' => '1', 'permission_id' => $permission->id];
            $permsLinked[] = ['role_id' => '2', 'permission_id' => $permission->id];
            $permsLinked[] = ['role_id' => '3', 'permission_id' => $permission->id];
            $permsLinked[] = ['role_id' => '4', 'permission_id' => $permission->id];
            $permsLinked[] = ['role_id' => '5', 'permission_id' => $permission->id];
        }

        $this->role_permission_model->insert_batch($permsLinked);
    }

    public function down()
    {
        $permissions    = $this->permission_model->find_all(['module' => 'streams'], 'array');
        $permissionsIds = array_column($permissions, 'id');

        if ($permissionsIds !== []) {
            $this->permission_model->delete_in('id', $permissionsIds);
        }
    }
}
