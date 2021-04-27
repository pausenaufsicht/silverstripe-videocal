<?php
use SilverStripe\View\Parsers\ShortcodeParser;

ShortcodeParser::get('default')->register('localvideo', ['Zazama\\Videocal\\LocalVideoShortcodeParser', 'LocalVideoParser']);
