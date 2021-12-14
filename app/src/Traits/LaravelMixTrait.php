<?php

use SilverStripe\Control\Director;

trait LaravelMixTrait {

    static function starts_with($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle != '' && substr($haystack, 0, strlen($needle)) === (string)$needle) {
                return true;
            }
        }

        return false;
    }

    public function mix($path, $theme)
    {
        static $manifests = [];
        if (!self::starts_with($path, '/')) {
            $path = "/{$path}";
        }

        $manifestDirectory = '_resources/themes/' . $theme . '/dist';

        $manifestPath = Director::getAbsFile($manifestDirectory . '/mix-manifest.json');
        if (!isset($manifests[$manifestPath])) {
            if (!file_exists($manifestPath)) {
                throw new \RuntimeException('The Mix manifest does not exist.');
            }
            $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
        }
        $manifest = $manifests[$manifestPath];

        $manifestValue = $manifestDirectory . $manifest[$path];

        return '/' . $manifestValue; //prefixed with slash for relative to root urls
    }
}
