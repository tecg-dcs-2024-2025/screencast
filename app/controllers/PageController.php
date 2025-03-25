<?php

namespace Animal\Controllers;

class PageController
{
    public function welcome()
    {
        echo 'welcome';
        echo '<a href="/loss-declaration/create">Déclarer la perte de mon animal</a>';
    }
}
