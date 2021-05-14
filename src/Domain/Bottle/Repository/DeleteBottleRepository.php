<?php

namespace App\Domain\Bottle\Repository;

use PDO;

/**
 * Repository.
 */
class DeleteBottleRepository
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
	public function deleteBottle(int $id): bool
	{

		$sql = "Delete from alcohol where id = $id;";

		return (bool)$this->connection->prepare($sql)->execute();
	}
}

