<?php

namespace Zazama\Videocal;

use SilverStripe\View\ArrayData;
use SilverStripe\ORM\ArrayList;

class LocalVideoShortcodeParser {
    public static function LocalVideoParser($arguments, $content, $parser, $tagName) {
        $localVideoId = $arguments['videoid'];
        if(!$localVideoId) {
            return '';
        }

        $localVideo = LocalVideo::get_by_id(LocalVideo::class, $localVideoId);
        if(!$localVideo) {
            return '';
        }

        return ArrayData::create([
            'Video' => $localVideo->Video(),
            'Thumbnail' => $localVideo->Thumbnail(),
            'Arguments' => new ArrayList(array_map(static function ($key, $value) {
                return new ArrayData([
                    'Key' => $key,
                    'Value' => $value
                ]);
            }, array_keys($arguments), $arguments))
        ])->renderWith('LocalVideoEmbed');
    }
}
