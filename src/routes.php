<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'films' => ['FilmController', 'index',],
    'films/show' => ['FilmController', 'show', ['id']],
    'films/form' => ['FilmController', 'form',],
    'films/add' => ['FilmController', 'add',],
    'films/delete' => ['FilmController', 'deleteFilm', ['id']],
    'films/edit' => ['FilmController', 'edit', ['id']],
    'films/update' => ['FilmController', 'updateFilm',],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
];
