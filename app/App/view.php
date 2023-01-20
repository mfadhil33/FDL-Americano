<?php



namespace FdlAmericano\MhdFadhilAp\App;


class view {

    public static function render(string $view, $model){

        require __DIR__ . '/../View/header.php';
        require __DIR__ . '/../View/' . $view. '.php';
        require __DIR__ . '/../View/footer.php';






        
    }
}