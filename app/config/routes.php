<?php

Router::add('article/(\d+)', ['controller' => 'Article', 'action' => 'show']);
Router::add('admin/articles/add', ['controller' => 'Article', 'action' => 'create']);
Router::add('admin/articles/edit/(\d+)', ['controller' => 'Article', 'action' => 'edit']);
Router::add('admin/articles', ['controller' => 'Article', 'action' => 'adminIndex']);
Router::add('admin/users/add', ['controller' => 'User', 'action' => 'create']);
Router::add('admin/users/edit/(\d+)', ['controller' => 'User', 'action' => 'edit']);
Router::add('admin/users', ['controller' => 'User', 'action' => 'index']);
Router::add('admin', ['controller' => 'Auth', 'action' => 'welcome']);
Router::add('login', ['controller' => 'Auth', 'action' => 'login']);
Router::add('', ['controller' => 'Article', 'action' => 'clientIndex']);
