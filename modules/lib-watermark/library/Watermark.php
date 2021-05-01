<?php
/**
 * Watermark
 * @package lib-watermark
 * @version 0.0.1
 */

namespace LibWatermark\Library;

use LibMedia\Object\Media;
use claviska\SimpleImage;

class Watermark
{
    public static function diagonalRepeatText(Media $file, array $options, SimpleImage $image) {
        $image->textBox($options['text'], [
            'fontFile' => $options['font'],
            'size'     => $options['size'] ?? $image->getWidth() / 60,
            'color'    => $options['color'] ?? [
                'red'       => 255,
                'green'     => 255,
                'blue'      => 255,
                'alpha'     => .5
            ],
            'xOffset'  => 30,
            'yOffset'  => 30,
            'anchor'   => 'top left',
            'align'    => 'left'
        ]);

        return $image;
    }

    public static function put(Media $file, array $options){
        $handler = $file->getHandlerClass();
        $local   = $handler::getLocalPath($file->media->path);

        $image   = new SimpleImage();
        $image->fromFile($local);

        $type    = $options['type'] ?? null;
        if(!$type)
            throw new \InvalidArgumentException('Option `type` is required');

        if(!method_exists(self::class, $type))
            throw new \InvalidArgumentException('Option `type` is not registered as watermark type');

        return self::$type($file, $options, $image);
    }
}
