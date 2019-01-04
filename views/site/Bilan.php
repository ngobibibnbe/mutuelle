<?php
/* @var $this yii\web\View */
use yii\helpers\VarDumper;
use app\assets\SemanticAsset;
use yii\helpers\Html;
$this->title = Yii::$app->user->identity->username;
$this->title = 'Bilan de l\'association';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "container">
    <div> <p class= "header"> Bilan de la session "recuperer la session" </p></div>  <br/><br/>
    <div class="ui five column stackable centered grid" >
    <div class="column ">
        <div class="ui raised segment">
        <div class="ui placeholder">
            <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
            </div>
        </div>
        </div>
    </div>
    <div class="column">
        <div class="ui raised segment">
        <div class="ui placeholder">
            <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
            </div>
        </div>
        </div>
    </div>
    <div class="column">
        <div class="ui raised segment">
        <div class="ui placeholder">
            <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
            </div>
        </div>
        </div>
    </div>
    </div><br>      
    

    <div class="ui five column stackable centered grid">
    <div class="column">
        <div class="ui raised segment">
        <div class="ui placeholder">
            <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
            </div>
        </div>
        </div>
    </div>
    <div class="column">
        <div class="ui raised segment">
        <div class="ui placeholder">
            <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
            </div>
        </div>
        </div>
    </div>
    <div class="column">
        <div class="ui raised segment">
        <div class="ui placeholder">
            <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
            </div>
        </div>
        </div>
    </div>
    </div>      

    <div class="ui five column stackable centered grid">
    <div class="column">
        <div class="ui raised segment">
        <div class="ui placeholder">
            <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
            </div>
        </div>
        </div>
    </div>
    <div class="column">
        <div class="ui raised segment">
        <div class="ui placeholder">
            <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
            </div>
        </div>
        </div>
    </div>
    <div class="column">
        <div class="ui raised segment">
        <div class="ui placeholder">
            <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
            </div>
        </div>
        </div>
    </div>
    </div>      
</div> 


    <style>
        .container {
            background-image: url("../../web/img/tirelire.jpg") !important;
            background-size: cover !important;
        }
        .dette{
        font-family : Times, serif;
    }
    p {
            text-align: center;
            margin: auto;
            font-size: 20px;
        }
        .header {
                    font-family : "source serif pro",Times, serif;
                    font-size: 40px;
                    text-decoration : "blink";
                    font-style : "italic";
                }
        .danger {
            color: brown;
        }
        td {
            width: 300px;
            height: 100px;
        }
        .cadress {
            padding-left: 100px;
            padding-right: 100px;
        }
        p.cadre {
            text-align: center;
            font-size: 40px;
        }
        .cadres {
            padding-left: 60px;
        }
        hr {
            width: 100px;
        }
        .sop {
            margin: 65px;
        }
    </style>
