<?php


namespace Trello\Api\Organization;

/**
 * Trello Organization Memberships API
 * @link https://developer.atlassian.com/cloud/trello/rest/api-group-organizations
 *
 */
class Memberships extends \Trello\Api\AbstractApi
{
    /**
     * Base path of board power ups api
     * @var string
     */
    protected $path = 'organizations/#id#/memberships';

    /**
     * Get Memberships of an Organization
     * @link https://developer.atlassian.com/cloud/trello/rest/api-group-organizations/#api-organizations-id-memberships-get
     *
     * @param string $id     the organization's id
     * @param array  $params optional parameters
     *
     * @return Memberships
     */
    public function all($id, array $params = array())
    {
        return $this->get($this->getPath($id), $params);
    }

}