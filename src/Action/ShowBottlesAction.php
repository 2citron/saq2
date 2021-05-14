<?php

namespace App\Action;

use App\Domain\Bottle\Service\ShowBottles;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ShowBottlesAction
{
	private $bottle;

	public function __construct(ShowBottles $bottle)
	{
		$this->bottle = $bottle;
	}

	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {
		// Collect input from the HTTP request
		$data = (array)$request->getParsedBody();

		// Invoke the Domain with inputs and retain the result
		$userId = $this->bottle->fetchBottle($data);

		// Transform the result into the JSON representation
		$result = [
			'alcohols' => $userId
		];

		// Build the HTTP response
		$response->getBody()->write((string)json_encode($result));

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(201);
	}
}
