<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author CHRV
 * @since 
 */
class SemanticAsset extends AssetBundle
{
    public $sourcePath = '@bower/semantic-ui';
    
    public $css = [
        'dist/semantic.min.css',
    ];
    public $js = [
        'dist/semantic.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
