<?php

use madmis\JiraApi\JiraApi;

class IssueEndpointTest extends \PHPUnit_Framework_TestCase
{
    public function testGetApiUri()
    {
        $api = new JiraApi(
            'http://localhost:8080',
            '/rest/api/2'
        );

        $this->assertEquals('/rest/api/2/issue/', $api->issue()->getApiUrn());
    }
}