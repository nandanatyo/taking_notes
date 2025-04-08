<?php

function route($action, $id = null) {

    if ($action === 'notes') {
        $controller = new NoteController();
        $controller->index();
    }
    else if ($action === 'create_note') {
        $controller = new NoteController();
        $controller->create();
    }
    else if ($action === 'store_note') {
        $controller = new NoteController();
        $controller->store();
    }
    else if ($action === 'show_note') {
        $controller = new NoteController();
        $controller->show($id);
    }
    else if ($action === 'edit_note') {
        $controller = new NoteController();
        $controller->edit($id);
    }
    else if ($action === 'update_note') {
        $controller = new NoteController();
        $controller->update($id);
    }
    else if ($action === 'delete_note') {
        $controller = new NoteController();
        $controller->delete($id);
    }


    else if ($action === 'login') {
        $controller = new UserController();
        $controller->login();
    }
    else if ($action === 'process_login') {
        $controller = new UserController();
        $controller->processLogin();
    }
    else if ($action === 'register') {
        $controller = new UserController();
        $controller->register();
    }
    else if ($action === 'process_register') {
        $controller = new UserController();
        $controller->processRegister();
    }
    else if ($action === 'logout') {
        $controller = new UserController();
        $controller->logout();
    }


    else {
        $controller = new UserController();
        $controller->login();
    }
}
?>