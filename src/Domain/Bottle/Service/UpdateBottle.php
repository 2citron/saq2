<?php

namespace App\Domain\Bottle\Service;

use App\Domain\Bottle\Repository\UpdateBottleRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class UpdateBottle
{
	/**
	 * @var UpdateBottleRepository
	 */
	private $repository;

	/**
	 * The constructor.
	 *
	 * @param UpdateBottleRepository $repository The repository
	 */
	public function __construct(UpdateBottleRepository $repository)
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
	public function updateBottle(array $data): bool
	{

		// Insert bottle
		$bottleId = $this->repository->updateBottle($data);

		// Logging here: Bottle created successfully
		//$this->logger->info(sprintf('Bottle created successfully: %s', $bottleId));

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
	private function validateNewBottle(array $data): void
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
