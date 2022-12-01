<?php

namespace BTL\Model\Beer;

use BTL\Database\BaseDao;
use BTL\Model\Beer;
use PDO;

class Dao extends BaseDao
{
    const FIELDS = [
        'id',
        'name',
        'style_id',
        'from_id',
        'created',
        'last_updated'
    ];

    public function save(Beer $beer): bool
    {
        $sql = "
        INSERT INTO beer (
            id,
            name,
            style_id,
            from_id,
            created,
            last_updated
        ) VALUES (
            :id,
            :name,
            :style_id,
            :from_id,
            NOW(),
            null
        ) ON DUPLICATE KEY UPDATE
            name = :name,
            style_id = :style_id,
            created = :created,
            last_updated = NOW()";

        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':id', $beer->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':name', $beer->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':style_id', $beer->getStyleId(), PDO::PARAM_INT);
        $stmt->bindValue(':from_id', $beer->getFromId(), PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result && $beer->getId() === null) {
            $beer->setId($this->getPDO()->lastInsertId());
        }

        return $result;
    }

    public function getById(int $id): array
    {
        $sql = "
        SELECT " . implode(', ', static::FIELDS) . "
          FROM beer
         WHERE id = :id";

        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllStartingAt(int $offset): array
    {
        $sql = "
            SELECT " . implode(', ', static::FIELDS) . "
              FROM beer
             LIMIT " . static::LIMIT . "
            OFFSET :offset";

        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}