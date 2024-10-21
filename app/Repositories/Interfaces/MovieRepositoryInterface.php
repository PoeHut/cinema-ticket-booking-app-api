<?php
namespace App\Repositories\Interfaces;

use App\Models\Movie;

interface MovieRepositoryInterface {
    public function createMovie(array $data);
    public function getAllMovies();
    public function getMovieById($id);
    public function updateMovie(array $data, Movie $movie);
    public function deleteMovie(Movie $movie);
}