<?php

namespace App\Rules;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query\ResultSetMapping;
use Rakit\Validation\Rule;

class UniqueRule extends Rule
{
    protected EntityManager $manager;

    public function __construct(EntityManager $manager)
    {
        $this->message = ':attribute :value has been used';
        $this->fillableParams = [
            'table',
            'column',
            'id',
            'idColumn'
        ];
        $this->manager = $manager;
    }

    public function check($value): bool
    {
        $this->requireParameters(
            [
                'table',
                'column'
            ]
        );

        $column = $this->parameter('column');
        $table = $this->parameter('table');
        $id = $this->parameter('id');
        $idColumn = $this->parameter('idColumn') ?? 'id';
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('count', 'count');
        $sql = "select count(*) count from $table where $column = ?";
        if ($id !== null) {
            $sql .= " and $idColumn != ?";
        }
        $query = $this->manager->createNativeQuery($sql, $rsm)
            ->setParameter(0, $value);
        if ($id !== null) {
            $query->setParameter(1, $id);
        }

        return (int)$query->getSingleScalarResult() === 0;
    }
}