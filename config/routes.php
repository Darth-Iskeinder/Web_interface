<?php

return array(
    'users/([0-9]+)' => 'users/view/$1', //actionView UsersController
    
    
    'users/page-([0-9]+)' => 'users/index/$1', //actionIndex in UsersController
    
    '' => 'admin/login', //actionLogin AdminController
    'admin/create' => 'admin/create', //actionCreate AdminController 
    'admin/edit' => 'admin/edit', //actionEdit AdminController 
);

