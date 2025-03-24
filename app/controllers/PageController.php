<?php

namespace Animal\Controllers;

class PageController
{
    public function welcome()
    {
        echo 'welcome'.PHP_EOL;
        echo '<a href="/loss-declaration/create">Déclarer la perte de mon animal</a>';
    }
}
