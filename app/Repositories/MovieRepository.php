<?php
namespace App\Repositories;

use App\Models\Movie;
use App\Repositories\Interfaces\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface {
    public function createMovie(array $data) {
        return Movie::create($data);
    }

    public function getAllMovies() {
        return Movie::paginate(10);
    }

    public function getMovieById($id) {
        return Movie::where('id', $id)->first();
    }

    public function updateMovie(array $data) {
        return Movie::where('id', $data->id)->update($data);
    }

    public function deleteMovie($id) {
        return Movie::where('id', $id)->delete();
    }
}