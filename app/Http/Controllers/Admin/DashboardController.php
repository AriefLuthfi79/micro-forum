<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

	/**
	* Constructor DashboardController
	*
	* @return void
	*/
    public function __construct()
    {
    	$this->middleware(['auth', 'admin']);
    }

    /**
	* Show the admin's dashboard
	*
	* @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
    */
    public function index()
    {
    	return view('admin.dashboard.index');
    }
}
