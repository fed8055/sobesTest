<?php
//спец хуйня для перечисления файлов/объектов/etc что должны быть везде

global $db;
$db = dbExchange::instance();

global $user;
$user = userModel::instance();
