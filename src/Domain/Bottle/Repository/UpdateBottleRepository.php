<?php

namespace App\Domain\Bottle\Repository;

use PDO;

/**
 * Repository.
 */
class UpdateBottleRepository
{
	/**
	 * @var PDO The database connection
	 */
	private $connection;

	/**
	 * Constructor.
	 *
	 * @param PDO $connection The database connection
	 */
	public function __construct(PDO $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * Insert bottle row.
	 *
	 * @param array $bottle The bottle
	 *
	 * @return int The new ID
	 */
	public function updateBottle(array $bottle): bool
	{
		$row = [
			'id' => $bottle['id'],
			'name' => $bottle['name'],
            'type_id' => $bottle['type_id'],
            'cost' => $bottle['cost'],
			'producer'=> $bottle['producer'],
            'degree' => $bottle['degree'],
            'format' => $bottle['format']
		];

		$sql = "UPDATE alcohol SET 
				name=:name,
                type_id=:type_id, 
                cost=:cost, 
                producer=:producer,
                degree=:degree, 
                format=:format where id=:id;";

		return (bool)$this->connection->prepare($sql)->execute($row);
	}
}

