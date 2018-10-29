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
use SRC\Providers\ValidationURLService;

class App
{
    public function load()
    {
        ValidationURLService::get()->load(SearchBreakService::get()->getDiscoversMethod(), SearchBreakService::get()->getSmashURL());
    }

    public function run()
    {
        $this->load();

        if (ValidationURLService::get()->validationPermission()) {

            SearchController::get()->load(SearchBreakService::get()->getDiscoversMethod(), SearchBreakService::get()->getRequestHeaders(), SearchBreakService::get()->getEndPoint());
            SearchController::get()->index();
        }
    }


}
