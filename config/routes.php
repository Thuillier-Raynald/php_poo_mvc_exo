<?php

$routes = array(
    array('home','default','index'),
    // Les conducteurs
    array('conducteur','conducteur','index'),
    array('new-conducteur','conducteur','new'),
    array('edit-conducteur','conducteur','edit', array('id')),
    array('delete-conducteur','conducteur','delete', array('id')),
    // Les vehicules
    array('vehicule','vehicule','index'),
    array('new-vehicule','vehicule','new'),
    array('edit-vehicule','vehicule','edit', array('id')),
    array('delete-vehicule','vehicule','delete', array('id')),
    // Association
    array('association','association','index'),
    array('new-association','association','new'),
    array('edit-association','association','edit', array('id')),
    array('delete-association','association','delete', array('id')),
);







