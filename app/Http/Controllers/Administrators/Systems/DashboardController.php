<?php

namespace App\Http\Controllers\Administrators\Systems;

use App\Http\Controllers\Controller;
use App\Repositories\Administrators\Systems\DashboardRepository;

class DashboardController extends Controller {

    private $repository;

    // function __construct(DashboardRepository $repository) {
    //     $this->repository = $repository;
    // }

    public function index() {
        return view('administrator.dashboard');
    }

}
