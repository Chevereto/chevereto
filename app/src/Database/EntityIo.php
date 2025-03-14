<?php

/*
 * This file is part of Chevereto.
 *
 * (c) Rodolfo Berrios <rodolfo@chevereto.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chevereto\Database;

use Chevereto\Database\Traits\GetWhereEqualsTrait;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Result;
use OutOfBoundsException;
use function Chevere\Message\message;

/**
 * Provides database I/O for the X entity.
 */
abstract class EntityIo implements EntityIoInterface
{
    use GetWhereEqualsTrait;

    protected string $whereIdClause;

    public function __construct(
        protected Database $database
    ) {
        $this->whereIdClause = $this->getWhereEquals($this->id());
    }

    abstract public function table(): string;

    abstract public function id(): string;

    public function select(int $id, string ...$columns): array
    {
        $args = empty($columns) ? ['*'] : $columns;
        $queryBuilder = $this->database->getQueryBuilder()
            ->select(...$args)
            ->from($this->table())
            ->where($this->whereIdClause)
            ->setParameter($this->id(), $id, ParameterType::INTEGER);
        /** @var Result $result */
        $result = $queryBuilder->execute();
        $fetch = $result->fetchAssociative();
        if ($fetch === false) {
            throw new OutOfBoundsException(
                message('No record exists for id `%id%`', (string) $id)
            );
        }

        return $fetch;
    }

    public function delete(int $id): int
    {
        return $this->database->getQueryBuilder()
            ->delete($this->table())
            ->where($this->whereIdClause)
            ->setParameter($this->id(), $id, ParameterType::INTEGER)
            ->execute();
    }

    public function update(int $id, string ...$values): int
    {
        $queryBuilder = $this->database->getQueryBuilder()
            ->update($this->table());
        foreach ($values as $column => $value) {
            $column = (string) $column;
            $queryBuilder
                ->set($column, ":{$column}")
                ->setParameter($column, $value);
        }

        return $queryBuilder
            ->where($this->whereIdClause)
            ->setParameter($this->id(), $id, ParameterType::INTEGER)
            ->execute();
    }

    public function insert(string ...$values): int
    {
        $queryBuilder = $this->database->getQueryBuilder()
            ->insert($this->table());
        foreach ($values as $column => $value) {
            $column = (string) $column;
            $queryBuilder
                ->setValue($column, ":{$column}")
                ->setParameter($column, $value);
        }
        $result = $queryBuilder->execute();
        if ($result === 1) {
            return (int) $queryBuilder->getConnection()->lastInsertId();
        }

        return 0;
    }
}
