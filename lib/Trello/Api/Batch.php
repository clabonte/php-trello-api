<?php


namespace Trello\Api;


class Batch extends AbstractApi
{
    /**
     * Base path of batch api
     * @var string
     */
    protected $path = 'batch';

    public $useMethod = 'get';
    public $usePath = '/1/batch';
    public $useParameters;
    public $useRequestHeaders;


    private $list = [];

    public function add(AbstractApi $command)
    {
        if (count($this->list) >= 10) {
            throw new \Exception('too many items');
        }
        if ($command->useMethod != 'get') {
            throw new \Exception('only get methods allowed');
        }
        $this->list[] = $command;
        return $this;
    }

    public function process()
    {

        $query = "&urls=";
        foreach ($this->list as $listItem) {
            $query.='/'.str_replace(',','%2C',$listItem->usePath).',';
        }
        var_dump($query);
        $this->useParameters = $query;
        return parent::process();
    }


}