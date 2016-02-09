<?php

namespace DigitalHammer\UserSettings;

class Settings
{
    private $settings;
    private $user;

    private $availableSettings;


    /**
     * Settings constructor.
     *
     * @param $user
     * @param $settings
     * @param $availableSettings
     */
    public function __construct($user, $settings, $availableSettings)
    {
        $this->user = $user;
        $this->settings = collect((array) $settings);
        $this->availableSettings = $availableSettings;
    }

    /**
     * Get all  user settings
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->settings;
    }

    /**
     * Get user settings by Id
     *
     * @param $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->settings->get($key);
    }

    /**
     * Set user settings
     *
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function set($key, $value)
    {
        if (is_array($key))
        {
            dd($key);

            return true;
        }

        return $this->user->settings = $this->settings->put($key, $value);
    }

    /**
     * Remove all user settings
     *
     * @return array
     */
    public function clear()
    {
        return $this->user->settings = [];
    }

    /**
     * Update user's settings
     *
     * @param $params
     */
    public function update($params)
    {
        foreach($this->availableSettings as $key)
        {
            if (isset($params[$key])) {
                $this->set($key, $params[$key]);
            }
        }

        return $this->user;
    }
}