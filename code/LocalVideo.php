<?php

class LocalVideo extends DataObject {

    private static $has_one = [
        'Video' => File::class,
        'Thumbnail' => Image::class
    ];

    private static $owns = [
        'Video',
        'Thumbnail'
    ];

    private static $summary_fields = [
        'ID' => 'ID',
        'getVideoName' => 'Video'
    ];

    public function getCMSFields() {
        $fields = FieldList::create(
            UploadField::create(
                'Video',
                'Video'
            )
                ->setFolderName('LocalVideos')
                ->setAllowedFileCategories('mov'),
            UploadField::create(
                'Thumbnail',
                'Thumbnail'
            )
                ->setFolderName('LocalVideos/Thumbnails')
                ->setAllowedFileCategories('image')
        );

        if($this->isInDB()) {
            $fields->add(LiteralField::create(
                'Shortcode',
                'Shortcode: ' . $this->getShortcode()
            ));
        }

        return $fields;
    }

    public function getVideoName() {
        if($this->VideoID) {
            return $this->Video()->Title;
        }

        return '-';
    }

    public function getShortcode() {
        return '[localvideo videoid="' . $this->ID . '" /]';
    }
}
