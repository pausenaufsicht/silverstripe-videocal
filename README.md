# Videocal

Silverstripe local video management module 

## Installation

`composer require zazama/videocal`

Use version 1.* for SilverStripe 3 and 2.* for SilverStripe 4.

## Usage

Videocal will add a "Videos" ModelAdmin where you can create Video DataObjects with a Thumbnail.
After saving, a Shortcode will be generated. You can paste it anywhere in your TinyMCE.

## Shortcodes

Normal
```
[localvideo videoid="1" /]
```

With any HTML attributes
```
[localvideo videoid="1" width="250" /]
```

## Video template

You can override the template LocalVideoEmbed.ss with your custom code.
