<?php

Router::add('article/(\d+)', ['controller' => 'Article', 'action' => 'show']);
Router::add('admin/articles/add', ['controller' => 'Article', 'action' => 'create']);
Router::add('admin/articles/store', ['controller' => 'Article', 'action' => 'store']);
Router::add('admin/articles/update', ['controller' => 'Article', 'action' => 'update']);
Router::add('admin/articles/edit/(\d+)', ['controller' => 'Article', 'action' => 'edit']);
Router::add('admin/articles/delete/(\d+)', ['controller' => 'Article', 'action' => 'delete']);
Router::add('admin/articles', ['controller' => 'Article', 'action' => 'adminIndex']);
Router::add('admin/users/add', ['controller' => 'User', 'action' => 'create']);
Router::add('admin/users/store', ['controller' => 'User', 'action' => 'store']);
Router::add('admin/users/update', ['controller' => 'User', 'action' => 'update']);
Router::add('admin/users/delete/(\d+)', ['controller' => 'User', 'action' => 'delete']);
Router::add('admin/users/edit/(\d+)', ['controller' => 'User', 'action' => 'edit']);
Router::add('admin/users', ['controller' => 'User', 'action' => 'index']);
Router::add('admin', ['controller' => 'Auth', 'action' => 'welcome']);
Router::add('login', ['controller' => 'Auth', 'action' => 'login']);
Router::add('', ['controller' => 'Article', 'action' => 'clientIndex']);
