<?php

$admin_statement = $pdo->prepare("SELECT * FROM users WHERE admin = is_admin");

$fetched_admin = $admin_statement->fetch();

$is_user_admin = $fetched_admin;


