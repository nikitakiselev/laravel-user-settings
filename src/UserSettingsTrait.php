<?php

namespace DigitalHammer\UserSettings;

trait UserSettingsTrait
{
    public function getFormValue($key)
    {
        if (in_array($key, $this->config))
        {
            return $this->settings->get($key);
        }

        return null;
    }


    /**
     * @param $settings
     *
     * @return Settings
     */
    public function getSettingsAttribute($settings)
    {
        return new Settings($this, json_decode($settings), $this->config);
    }
}