<?php
namespace Sichikawa\SendgridApiBuilder\Api\MailSettings;

class Bcc
{
    /**
     * @var bool
     */
    public $enable;

    /**
     * @var string
     */
    public $email;

    /**
     * @param boolean $enable
     * @return Bcc
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * @param string $email
     * @return Bcc
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


}
