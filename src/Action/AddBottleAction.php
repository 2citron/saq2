<?php

namespace App\Action;

use App\Domain\Bottle\Service\AddBottle;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AddBottleAction
{
	private $bottleCreator;

	public function __construct(AddBottle $bottleCreator)
	{
		$this->bottleCreator = $bottleCreator;
	}

	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {
		// Collect input from the HTTP request
		$data = (array)$request->getParsedBody();

		// Invoke the Domain with inputs and retain the result
		$bottleId = $this->bottleCreator->createBottle($data);

		// Transform the result into the JSON representation
		$result = [
			'Added successfully; bottle_id' => $bottleId
		];

		// Build the HTTP response
		$response->getBody()->write((string)json_encode($result));

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(201);
	}
}
