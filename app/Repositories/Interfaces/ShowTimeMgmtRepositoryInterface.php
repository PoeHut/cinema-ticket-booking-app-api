<?php
namespace App\Repositories\Interfaces;

use App\Models\ShowTime;

interface ShowTimeMgmtRepositoryInterface {
    public function createMovieShowTime(array $data);
    public function getAllMovieShowTime();
    public function getMovieShowTimeById($id);
    public function getShowTimeById($id);
    public function updateMoiveShowTime(array $data, ShowTime $showTime);
    public function deleteMovieShowTime(ShowTime $showTime);
}