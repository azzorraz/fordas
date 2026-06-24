<?php

require_once BASE_PATH . '/app/Config/Database.php';

class Sekolah
{
    public static function all($keyword = '', $limit = 15, $offset = 0)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT *
            FROM t_sekolah
            WHERE
                sekolah LIKE ?
                OR npsn LIKE ?
            ORDER BY sekolah
            LIMIT ?
            OFFSET ?
        ");

        $search = "%{$keyword}%";

        $stmt->bindValue(1, $search);
        $stmt->bindValue(2, $search);
        $stmt->bindValue(3, (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(4, (int)$offset, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO t_sekolah
            (
                npsn,
                sekolah,
                tingkat,
                status
            )
            VALUES
            (
                ?,
                ?,
                ?,
                ?
            )
        ");

        return $stmt->execute([
            $data['npsn'],
            $data['sekolah'],
            $data['tingkat'],
            $data['status']
        ]);
    }

    public static function find($id)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT *
            FROM t_sekolah
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateData($id, $data)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            UPDATE t_sekolah
            SET
                npsn = ?,
                sekolah = ?,
                tingkat = ?,
                status = ?
                WHERE id = ?
        ");

        return $stmt->execute([
            $data['npsn'],
            $data['sekolah'],
            $data['tingkat'],
            $data['status'],
            $id
        ]);
    }

    public static function deleteData($id)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            DELETE FROM t_sekolah
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }
    

    public static function countData($keyword = '')
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT COUNT(*) total
            FROM t_sekolah
            WHERE
                sekolah LIKE ?
                OR npsn LIKE ?
        ");

        $search = "%{$keyword}%";

        $stmt->execute([
            $search,
            $search
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public static function dropdownAvailable()
    {
        $db = Database::connect();
        $stmt = $db->query("
            SELECT
                s.id,
                s.sekolah
            FROM t_sekolah s

            LEFT JOIN t_user u
                ON u.sekolah_id = s.id
                AND u.role = 'operator'
            WHERE u.id IS NULL
            ORDER BY s.sekolah
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

