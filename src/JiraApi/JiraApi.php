<?php

namespace madmis\JiraApi;

use madmis\JiraApi\Authentication\AuthenticationInterface;
use madmis\JiraApi\Client\ClientInterface;
use madmis\JiraApi\Client\GuzzleClient;
use madmis\JiraApi\Endpoint\IssueEndpoint;

class JiraApi
{
    /**
     * @var string
     */
    private $jiraBaseUrl;

    /**
     * @var string
     */
    private $jiraApiUrn = '/rest/api/2';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param string $jiraBaseUrl
     * @param AuthenticationInterface $authentication
     */
    public function __construct($jiraBaseUrl, AuthenticationInterface $authentication)
    {
        $this->jiraBaseUrl = trim($jiraBaseUrl, '/');
        $this->client = new GuzzleClient($authentication, $this->getApiUri());
    }

    /**
     * @return string
     */
    private function getApiUri()
    {
        return sprintf('%s%s', $this->jiraBaseUrl, $this->jiraApiUrn);
    }

    /**
     * @return IssueEndpoint
     */
    public function issue()
    {
        return new IssueEndpoint($this->client);
    }
}
