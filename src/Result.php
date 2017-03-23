<?php
namespace zertex\GeoIP;

/**
 * Class Result
 * @package zertex\GeoIP
 *
 * @property string|null country
 * @property Location location
 */
class Result extends ResultBase
{
    protected function getCountry($data)
    {
        $value = null;
        if (isset($data['country']['names']['en'])) {
            $value = $data['country']['names']['en'];
        }
        return $value;
    }

    protected function getIsoCode($data) 
    {
        $value = null;

        if (isset($data['country']['iso_code'])) {
            $value = $data['country']['iso_code'];
        }

        return $value;
    }

    public function isDetected()
    {
        return ($this->location->lat !== null && $this->location->lng !== null);
    }
}
