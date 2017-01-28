<?php
namespace Sichikawa\SendgridApiBuilder\Api\TrackingSettings;

class GAnalytics
{
    /**
     * @var bool
     */
    public $enable;

    /**
     * @var string
     */
    public $utm_source;

    /**
     * @var string
     */
    public $utm_medium;

    /**
     * @var string
     */
    public $utm_term;

    /**
     * @var string
     */
    public $utm_content;

    /**
     * @var string
     */
    public $utm_campaign;

    /**
     * @param boolean $enable
     * @return GAnalytics
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * @param string $utm_source
     * @return GAnalytics
     */
    public function setUtmSource($utm_source)
    {
        $this->utm_source = $utm_source;
        return $this;
    }

    /**
     * @param string $utm_medium
     * @return GAnalytics
     */
    public function setUtmMedium($utm_medium)
    {
        $this->utm_medium = $utm_medium;
        return $this;
    }

    /**
     * @param string $utm_term
     * @return GAnalytics
     */
    public function setUtmTerm($utm_term)
    {
        $this->utm_term = $utm_term;
        return $this;
    }

    /**
     * @param string $utm_content
     * @return GAnalytics
     */
    public function setUtmContent($utm_content)
    {
        $this->utm_content = $utm_content;
        return $this;
    }

    /**
     * @param string $utm_campaign
     * @return GAnalytics
     */
    public function setUtmCampaign($utm_campaign)
    {
        $this->utm_campaign = $utm_campaign;
        return $this;
    }


}
