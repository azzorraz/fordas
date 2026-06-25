<?php

require_once BASE_PATH . '/app/Config/Database.php';

class JenisPengajuan
{
        public static function all(
                $keyword = '',
                $page = 1,
                $perPage = 10
            )
    {
        $db = Database::connect();
        $sql = "
            SELECT *
            FROM t_jenis_pengajuan
            WHERE 1=1
        ";
        $params = [];
        if ($keyword != '') {
            $sql .= " AND nama LIKE ? ";
            $params[] = "%{$keyword}%";
        }
        $sql .= " ORDER BY nama ASC ";
        $offset = ($page - 1) * $perPage;
        $sql .= " LIMIT $offset, $perPage ";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
        public static function findByNama($nama)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT *
            FROM t_jenis_pengajuan
            WHERE nama = ?
            LIMIT 1
        ");

        $stmt->execute([$nama]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        public static function create($data)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO t_jenis_pengajuan
            (
                nama,
                aktif
            )
            VALUES
            (
                ?,
                ?
            )
        ");

        return $stmt->execute([

            $data['nama'],

            $data['aktif']

        ]);
    }

        public static function find($id)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT *
            FROM t_jenis_pengajuan
            WHERE id=?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        public static function updateData($id,$data)
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            UPDATE t_jenis_pengajuan
            SET
                nama=?,
                aktif=?
            WHERE id=?
        ");

        return $stmt->execute([
            $data['nama'],
            $data['aktif'],
            $id
        ]);
    }

        public static function toggleStatus($id)
    {
        $db=Database::connect();

        $stmt=$db->prepare("
            UPDATE t_jenis_pengajuan
            SET aktif=
                CASE
                    WHEN aktif=1 THEN 0
                    ELSE 1
                END
            WHERE id=?
        ");

        return $stmt->execute([$id]);
    }

        public static function countFiltered($keyword = '')
    {
        $db = Database::connect();

        $sql = "
            SELECT COUNT(*) AS total
            FROM t_jenis_pengajuan
            WHERE 1=1
        ";

        $params = [];

        if ($keyword != '') {

            $sql .= " AND nama LIKE ? ";

            $params[] = "%{$keyword}%";
        }

        $stmt = $db->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}