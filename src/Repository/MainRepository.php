<?php

namespace App\Repository;

class MainRepository extends UserRepository
{
    public function search(string $research): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $user = "$research%";
        $project= "%$research%";

        $query=
            'SELECT slug
            FROM user u
            WHERE u.slug LIKE :user
            UNION
            SELECT slug
            FROM project p
            WHERE p.slug LIKE :project';
        $stmt = $conn->prepare($query);
        $resultSet = $stmt->executeQuery([
            'user' => $user,
            'project' => $project,
        ]);

        return $resultSet->fetchAllAssociative();
    }
}