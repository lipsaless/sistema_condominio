<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
class DashboardController extends Controller
{
    private $repository;
    private $validator;
    public function __construct(UserRepositoty $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
}
