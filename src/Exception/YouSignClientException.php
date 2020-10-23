<?php


namespace Easyblue\YouSign\Exception;


use GuzzleHttp\Exception\ClientException;

class YouSignClientException extends \Exception
{
    protected array $violations = [];

    public function __construct(ClientException $clientException)
    {
        parent::__construct($clientException->getMessage(), $clientException->getCode());
        $json = (string) $clientException->getResponse()->getBody();

        $datas = json_decode($json, true);
        if (isset($datas['violations'])) {
            $violations = [];
            foreach ($datas['violations'] as $violation) {
                $violations[$violation['propertyPath']] = $violation['message'];
            }
            $this->violations = $violations;
        }
    }

}