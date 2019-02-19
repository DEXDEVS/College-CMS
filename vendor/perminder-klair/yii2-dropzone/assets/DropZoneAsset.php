<?php

namespace kato\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle for DropZone Widget
 */
class DropZoneAsset extends AssetBundle
{

    public $sourcePath = '@dropzone/bower_components';

    public $js = [
        "dropzone/dist/dropzone.js"
    ];

    public $css = [
        "dropzone/dist/min/dropzone.min.css"
    ];

    /**
     * @var array
     */
    public $publishOptions = [
        'forceCopy' => true
    ];

}