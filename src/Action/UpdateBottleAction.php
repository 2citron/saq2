<?php

namespace App\Action;

use App\Domain\Bottle\Service\UpdateBottle;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UpdateBottleAction
{
	private $bottle ;

	public function __construct(UpdateBottle $bottle )
	{
		$this->bottle  = $bottle ;
	}

	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {
		// Collect input from the HTTP request
		$data = (array)$request->getParsedBody();

		// Invoke the Domain with inputs and retain the result
		$success = $this->bottle ->updateBottle($data);

		// Transform the result into the JSON representation
		if ($success)
		{
			$result = [
				'Updated successfully'
			];
			$response->getBody()->write((string)json_encode($result));

			return $response
				->withHeader('Content-Type', 'application/json')
				->withStatus(201);
		}
		else
			{
				$result = [
					'Update went wrong'
				];
				$response->getBody()->write((string)json_encode($result));

				return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(403);
			}
	}
}
