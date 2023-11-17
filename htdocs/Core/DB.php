<?php

function getConnection() {
    $conn = new \PDO("mysql:host=localhost;dbname=Gyeonggi2021;charset=utf8mb4", "root", "", [
       \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
       \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    ]);

    return $conn;
}

function execute($sql, $data = []) {
    $q = getConnection()->prepare($sql);
    $q->execute($data);
    return $q;
}
function fetch($sql, $data = []) {
    return execute($sql, $data)->fetch();
}
function fetchAll($sql, $data = []) {
    return execute($sql, $data)->fetchAll();
}
function lastInsertId() {
    return getConnection()->lastInsertId();
}
function find($table, $id) {
    return fetch("SELECT * FROM `$table` WHERE id = ?", [$id]);
}
function who($user_id) {
    return fetch("SELECT * FROM users WHERE user_id = ?", [$user_id]);
}
