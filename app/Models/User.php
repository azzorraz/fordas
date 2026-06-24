<?php

require_once BASE_PATH .
'/app/Config/Database.php';

class User
{
        public static function all(
        $keyword = '',
        $role = '',
        $status = '',
        $page = 1,
        $perPage = 15
    )
    {
        $db = Database::connect();
        $sql = "
            SELECT
                u.*,
                s.sekolah
            FROM t_user u
            LEFT JOIN t_sekolah s
                ON s.id = u.sekolah_id
            WHERE 1=1
        ";
        $params = [];
        if ($keyword != '') {
            $sql .= "
                AND (
                    u.nama LIKE ?
                    OR u.username LIKE ?
                    OR s.sekolah LIKE ?
                )
            ";
            $search = "%{$keyword}%";
            $params[] = $search;
            $params[] = $search;
            $params[] = $search;
        }
        if ($role != '') {
            $sql .= " AND u.role = ? ";
            $params[] = $role;
        }
        if ($status !== '') {
            $sql .= " AND u.is_active = ? ";
            $params[] = $status;
        }
        $offset = ($page - 1) * $perPage;
        $sql .= "LIMIT $offset, $perPage";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
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

        public static function find($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("
            SELECT *
            FROM t_user
            WHERE id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        public static function updateData($id, $data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("
            UPDATE t_user
            SET
                sekolah_id = ?,
                nama = ?,
                username = ?,
                role = ?,
                is_active = ?
            WHERE id = ?
        ");
        return $stmt->execute([
            $data['sekolah_id'],
            $data['nama'],
            $data['username'],
            $data['role'],
            $data['is_active'],
            $id
        ]);
    }

        public static function updatePassword($id, $password)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            UPDATE t_user
            SET password = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            password_hash(
                $password,
                PASSWORD_DEFAULT
            ),
            $id
        ]);
    }

        public static function toggleStatus($id)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            UPDATE t_user
            SET is_active =
                CASE
                    WHEN is_active = 1 THEN 0
                    ELSE 1
                END
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }

        public static function countData()
    {
        $db = Database::connect();

        $stmt = $db->query("
            SELECT COUNT(*) total
            FROM t_user
        ");

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

        public static function countFiltered(
        $keyword = '',
        $role = '',
        $status = ''
    )
    {
        $db = Database::connect();

        $sql = "
            SELECT COUNT(*) total
            FROM t_user u
            LEFT JOIN t_sekolah s
                ON s.id = u.sekolah_id
            WHERE 1=1
        ";

        $params = [];

        if ($keyword != '') {

            $sql .= "
                AND (
                    u.nama LIKE ?
                    OR u.username LIKE ?
                    OR s.sekolah LIKE ?
                )
            ";

            $search = "%{$keyword}%";

            $params[] = $search;
            $params[] = $search;
            $params[] = $search;
        }

        if ($role != '') {
            $sql .= " AND u.role = ? ";
            $params[] = $role;
        }

        if ($status !== '') {
            $sql .= " AND u.is_active = ? ";
            $params[] = $status;
        }

        $stmt = $db->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

 
}