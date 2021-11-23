<?php

namespace App\Controller;

use App\Model\FilmManager;
use App\Model\CategoryManager;

class FilmController extends AbstractController
{
    public function index(): string
    {
        $filmManager = new FilmManager();
        $films = $filmManager->selectAll('title');

        return $this->twig->render('Film/index.html.twig', ['films' => $films]);
    }

    public function show(int $id): string
    {
        $filmManager = new FilmManager();
        $film = $filmManager->selectOneById($id);

        return $this->twig->render('Film/show.html.twig', ['film' => $film]);
    }
    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $film = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $filmManager = new FilmManager();
            $id = $filmManager->insert($film);
            header('Location:/films/show?id=' . $id);
        }

        return $this->twig->render('Film/add.html.twig');
    }

    public function form()
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        return $this->twig->render('Film/add.html.twig', ['categories' => $categories]);
    }

    public function deleteFilm($id)
    {
        $filmManager = new FilmManager();
        $film = $filmManager->delete($id);

        header('Location:/');

        return $this->twig->render('Film/show.html.twig', ['film' => $film]);
    }

    public function edit(int $id): string
    {
        $filmManager = new FilmManager();
        $film = $filmManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $film = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $filmManager->update($film);
            header('Location: /films/show?id=' . $id);
        }

        return $this->twig->render('Film/edit.html.twig', [
            'film' => $film,
        ]);
    }
    public function updateFilm()
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        return $this->twig->render('Film/edit.html.twig', ['categories' => $categories]);
    }
}
