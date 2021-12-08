<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model", "ModelUser.php"));


class ControllerUser {

    public static function read() {
    }

    public static function create_b() {
        require ('../view/user/create.php');
    }

    public static function create() {
        $controller = 'user';
        $view = 'create';
        $pagetitle = 'Register';
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $controller = 'user';
        $view = 'created';
        $pagetitle = 'registered';

        $user = new ModelUser($_POST['name'], $_POST['price'], $_POST['description'],$_POST['image']);
        $user->save();
        $tab_u = ModelUser::getAllUser();
        require File::build_path(array("view", "view.php"));
    }

    public static function delete(){}

    public static function deleted(){}
}
?>