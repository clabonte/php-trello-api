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
    public $usePath = '/batch';
    public $useParameters=[];
    public $useRequestHeaders=[];


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

        $query='';
        foreach ($this->list as $listItem) {
            $query.='/'.str_replace(',','%2C',$listItem->usePath).',';
        }
        $query = mb_substr($query,0,-1);

        $this->useParameters['urls'] = $query;
        return parent::process();
    }


}