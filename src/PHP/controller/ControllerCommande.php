<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model", "ModelCommande.php"));


class ControllerCommande {

    public static function read() {
    }

    public static function create() {
        require ('../view/user/create.php');
    }

    public static function created() {
        $user = new ModelCommande($_POST['name'], $_POST['price'], $_POST['description'],$_POST['image']);
        $user->save();
        self::readAll();
    }

    public static function delete(){}

    public static function deleted(){}

}
?>