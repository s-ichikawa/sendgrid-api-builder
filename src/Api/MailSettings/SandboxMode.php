<?php
namespace Sichikawa\SendgridApiBuilder\Api\MailSettings;

class SandboxMode
{
    /**
     * @var bool
     */
    public $enable;

    /**
     * @param boolean $enable
     * @return SandboxMode
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }


}
