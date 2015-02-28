<?php

class DashboardController extends BaseController {
    public function show()
    {
        return View::make('dashboard');
    }
}