<?php

namespace App\Action;

use App\Domain\Bottle\Service\DeleteBottle;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class DeleteBottleAction
{
	private $bottle ;

	public function __construct(DeleteBottle $bottle )
	{
		$this->bottle  = $bottle ;
	}

	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {
		// Collect input from the HTTP request

		$id = $request->getAttribute("id",0);

		// Invoke the Domain with inputs and retain the result
		$success = $this->bottle ->deleteBottle($id);

		// Transform the result into the JSON representation
		if ($success)
		{
			$result = [
				'Deleted successfully'
			];
		}
		else
		{
			$result = [
				'Delete went wrong'
			];
		}


		// Build the HTTP response
		$response->getBody()->write((string)json_encode($result));

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(201);
	}
}
