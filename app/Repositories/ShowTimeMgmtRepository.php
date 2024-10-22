<?php
namespace App\Repositories;

use App\Models\Movie;
use App\Models\ShowTime;
use App\Repositories\Interfaces\ShowTimeMgmtRepositoryInterface;

class ShowTimeMgmtRepository implements ShowTimeMgmtRepositoryInterface {
    public function createMovieShowTime(array $data) {
        return ShowTime::create($data);
    }

    public function getAllMovieShowTime() {
        return Movie::with('show_times')
                ->has('show_times') 
                ->paginate(10);
    }

    public function getMovieShowTimeById($id) {
        return Movie::with('show_times')
                ->where('id', $id)
                ->first();
    }

    public function getShowTimeById($id) {
        return ShowTime::where('id', $id)->first();
    }

    public function updateMoiveShowTime(array $data, ShowTime $showTime) {
        $showTime->update($data);
        return $showTime;
    }

    public function deleteMovieShowTime(ShowTime $showTime) {
        return $showTime->delete();
    }
}