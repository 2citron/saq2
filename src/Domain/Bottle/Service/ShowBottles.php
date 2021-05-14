<?php

namespace App\Domain\Bottle\Service;

use App\Domain\Bottle\Repository\ShowBottlesRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class ShowBottles
{
	/**
	 * @var ShowBottlesRepository
	 */
	private $repository;

	/**
	 * The constructor.
	 *
	 * @param ShowBottlesRepository $repository The repository
	 */
	public function __construct(ShowBottlesRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Create a new bottle.
	 *
	 * @param array $data The form data
	 *
	 * @return int The new bottle ID
	 */
	public function fetchBottle(array $data): array
	{
		// Fetch bottles
		$bottleId = $this->repository->selectAllBottles($data);

		return $bottleId;
	}

	/**
	 * Input validation.
	 *
	 * @param array $data The form data
	 *
	 * @throws ValidationException
	 *
	 * @return void
	 */
	private function validateNewUser(array $data): void
	{
		/*$errors = [];

		// Here you can also use your preferred validation library

		if (empty($data['bottlename'])) {
			$errors['bottlename'] = 'Input required';
		}

		if (empty($data['email'])) {
			$errors['email'] = 'Input required';
		} elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors['email'] = 'Invalid email address';
		}

		if ($errors) {
			throw new ValidationException('Please check your input', $errors);
		}*/
	}
}
