<?php
class AdminSession {
    private $admin_id;
    private $username;
    private $role_id;
    private $role_name;
    private $permissions;

    public function __construct($admin_id, $username, $role_id, $role_name, $permissions = []) {
        $this->admin_id     = $admin_id;
        $this->username     = $username;
        $this->role_id      = $role_id;
        $this->role_name    = $role_name;
        $this->permissions  = $permissions;
    }

    public function getId() {
        return $this->admin_id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getRoleId() {
        return $this->role_id;
    }

    public function getRoleName() {
        return $this->role_name;
    }

    public function getPermissions() {
        return $this->permissions;
    }

    public function hasPermission($permission) {
        return in_array($permission, $this->permissions);
    }

    public function isSuperAdmin() {
        return strtolower($this->role_name) === 'super admin';
    }
}


?>