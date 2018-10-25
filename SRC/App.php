<?php
/**
 * Created by IntelliJ IDEA.
 * User: rayli
 * Date: 24/10/2018
 * Time: 15:22
 */

namespace SRC;

use SRC\Controller\SearchController;
use SRC\Providers\SearchBreakService;
use SRC\Providers\ValidationService;

class App
{
    public function load()
    {
        ValidationService::get()->load(SearchBreakService::get()->getDiscoversMethod(), SearchBreakService::get()->getSmashURL());
    }

    public function run()
    {
        $this->load();

        if (ValidationService::get()->validationPermission()) {

            SearchController::get()->load(SearchBreakService::get()->getDiscoversMethod(), SearchBreakService::get()->getRequestHeaders(), SearchBreakService::get()->getSmashURL());
            SearchController::get()->index();
        }
    }


}
