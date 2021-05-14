<?php

namespace App\Domain\Bottle\Repository;

use PDO;

/**
 * Repository.
 */
class AddBottleRepository
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
	public function insertBottle(array $bottle): int
	{
		$row = [
			'name' => $bottle['name'],
            'type_id' => $bottle['type_id'],
            'cost' => $bottle['cost'],
			'producer'=> $bottle['producer'],
            'degree' => $bottle['degree'],
            'format' => $bottle['format']
		];

		$sql = "INSERT INTO alcohol SET 
				name=:name,
                type_id=:type_id, 
                cost=:cost, 
                producer=:producer,
                degree=:degree, 
                format=:format;";

		$this->connection->prepare($sql)->execute($row);

		return (int)$this->connection->lastInsertId();
	}
}

