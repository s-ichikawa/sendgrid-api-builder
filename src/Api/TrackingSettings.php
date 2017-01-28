<?php
namespace Sichikawa\SendgridApiBuilder\Api;

use Sichikawa\SendgridApiBuilder\Api\TrackingSettings\ClickTracking;
use Sichikawa\SendgridApiBuilder\Api\TrackingSettings\GAnalytics;
use Sichikawa\SendgridApiBuilder\Api\TrackingSettings\OpenTracking;
use Sichikawa\SendgridApiBuilder\Api\TrackingSettings\SubscriptionTracking;

class TrackingSettings
{
    /**
     * @var ClickTracking
     */
    public $click_tracking;

    /**
     * @var OpenTracking
     */
    public $open_tracking;

    /**
     * @var SubscriptionTracking
     */
    public $subscription_tracking;

    /**
     * @var GAnalytics
     */
    public $ganalytics;

    /**
     * @param ClickTracking $click_tracking
     * @return TrackingSettings
     */
    public function setClickTracking($click_tracking)
    {
        $this->click_tracking = $click_tracking;
        return $this;
    }

    /**
     * @param OpenTracking $open_tracking
     * @return TrackingSettings
     */
    public function setOpenTracking($open_tracking)
    {
        $this->open_tracking = $open_tracking;
        return $this;
    }

    /**
     * @param SubscriptionTracking $subscription_tracking
     * @return TrackingSettings
     */
    public function setSubscriptionTracking($subscription_tracking)
    {
        $this->subscription_tracking = $subscription_tracking;
        return $this;
    }

    /**
     * @param GAnalytics $ganalytics
     * @return TrackingSettings
     */
    public function setGanalytics($ganalytics)
    {
        $this->ganalytics = $ganalytics;
        return $this;
    }
}
