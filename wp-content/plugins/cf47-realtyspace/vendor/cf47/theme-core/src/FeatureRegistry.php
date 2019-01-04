<?php

namespace cf47\themecore;

class FeatureRegistry
{
    private $registeredFeatures;

    public function registerFeature($featureName){
        $this->registeredFeatures[] = $featureName;
    }

    public function isFeatureRegistered($featureName){
        return in_array($featureName, $this->registeredFeatures, true);
    }

}