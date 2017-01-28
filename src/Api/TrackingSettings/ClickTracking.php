<?php
namespace Sichikawa\SendgridApiBuilder\Api\TrackingSettings;

class ClickTracking
{
    /**
     * @var bool
     */
    public $enable;

    /**
     * @var bool
     */
    public $enable_text;

    /**
     * @param boolean $enable
     * @return ClickTracking
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * @param boolean $enable_text
     * @return ClickTracking
     */
    public function setEnableText($enable_text)
    {
        $this->enable_text = $enable_text;
        return $this;
    }


}
