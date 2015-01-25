<?php

$articles = $articleRepo->getAll ();
$articleView->index($articles) ;
