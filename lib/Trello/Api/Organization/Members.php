<?php


namespace Trello\Api\Organization;

/**
 * Trello Organization Members API
 * @link https://developer.atlassian.com/cloud/trello/rest/api-group-organizations
 *
 */
class Members extends \Trello\Api\AbstractApi
{
    /**
     * Base path of board power ups api
     * @var string
     */
    protected $path = 'organizations/#id#/members';

    /**
     * Get the Members of an Organization
     * @link https://developer.atlassian.com/cloud/trello/rest/api-group-organizations/#api-organizations-id-members-get
     *
     * @param string $id     the organization's id
     * @param array  $params optional parameters
     *
     * @return Members
     */
    public function all($id, array $params = array())
    {
        return $this->get($this->getPath($id), $params);
    }

}