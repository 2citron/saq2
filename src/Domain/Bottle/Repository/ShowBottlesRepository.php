<?php

namespace App\Domain\Bottle\Repository;

use PDO;

/**
 * Repository.
 */
class ShowBottlesRepository
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
	 * Insert user row.
	 *
	 * @param array $user The user
	 *
	 * @return int The new ID
	 */
	public function selectAllBottles(): array
	{
		$sql = "SELECT * FROM alcohol";
		$query = $this->connection->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}

