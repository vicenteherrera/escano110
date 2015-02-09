<?php


class acl {
    public static function can_edit_empresas() {
        return website::$user->is_in_group('administrador');
    }

    public static function can_edit_users() {
        return website::$user->is_in_group('administrador');
    }
    
    public static function can_edit_empresas_and_users() {
        return self::can_edit_empresas() && self::can_edit_users();
    }
}