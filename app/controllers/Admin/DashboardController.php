<?php
namespace Admin;

class DashboardController extends \BaseController
{
    public function show()
    {
        return \View::make('layouts.admin');
    }
}