<?php
namespace Sichikawa\SendgridApiBuilder\Api\MailSettings;

class BypassListManagement
{
    /**
     * @var bool
     */
    public $enable;

    /**
     * @param boolean $enable
     * @return BypassListManagement
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }


}
