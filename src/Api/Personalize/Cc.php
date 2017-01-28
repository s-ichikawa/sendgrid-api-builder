<?php
namespace Sichikawa\SendgridApiBuilder\Api\Personalize;

class Cc
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $name;

    /**
     * Cc constructor.
     * @param $email
     * @param null $name
     */
    public function __construct($email, $name = null)
    {
        $this->email = $email;
        $this->name = $name;
    }
}
