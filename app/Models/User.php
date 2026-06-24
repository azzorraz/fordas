<?php

require_once BASE_PATH .
'/app/Config/Database.php';

class User
{
    public static function all()
    {
        $db = Database::connect();

        $stmt = $db->query("
            SELECT
                u.*,
                s.sekolah
            FROM t_user u
            LEFT JOIN t_sekolah s
                ON s.id = u.sekolah_id
            ORDER BY u.nama
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
    $db = Database::connect();

    $stmt = $db->prepare("
        INSERT INTO t_user
        (
            sekolah_id,
            nama,
            username,
            password,
            role,
            is_active
        )
        VALUES
        (
            ?, ?, ?, ?, ?, ?
        )
    ");

    return $stmt->execute([
        $data['sekolah_id'],
        $data['nama'],
        $data['username'],
        password_hash(
            $data['password'],
            PASSWORD_DEFAULT
        ),
        $data['role'],
        $data['is_active']
    ]);
    }

    public static function findByUsername($username)
    {
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT *
            FROM t_user
            WHERE username = ?
            LIMIT 1
        ");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function findBySekolah($sekolahId)
    {
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT *
            FROM t_user
            WHERE sekolah_id = ?
            LIMIT 1
        ");
        $stmt->execute([$sekolahId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}