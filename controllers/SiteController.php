<?php

namespace app\controllers;

use app\models;
use app\models\ContactForm;
use app\models\LoginForm;
use DateInterval;
use DateTime;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {$connection = \Yii::$app->db;

        $model = new LoginForm();
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->is_active == 0 && Yii::$app->user->identity->is_admin == 0)) {
            $this->redirect('site/login');
        } else { $transaction = $connection->beginTransaction();

            try {

                $userid = Yii::$app->user->identity->id;

                $emprunts = models\Emprunt::find()
                    ->where("user_id='" . $userid . "'");
                $emprunt = $emprunts->sum('amount');

                $epargnes = models\Epargne::find()
                    ->where("user_id='" . $userid . "'");
                $epargne = $epargnes->sum('money');

                $social = Yii::$app->user->identity->social_font;

                $gains = models\Gains::find()
                    ->where("getter_id='" . $userid . "'");
                $gain = $gains->sum('gain');

                $epargnes = models\Epargne::find()->orderBy('created_at')
                    ->where("user_id='" . $userid . "'")
                    ->limit(5)
                    ->all();
                $emprunts = models\Emprunt::find()->orderBy('created_at')
                    ->where("user_id='" . $userid . "'")
                    ->limit(5)
                    ->all();
                $retraits = models\Retrait::find()->orderBy('created_at')
                    ->where("user_id='" . $userid . "'")
                    ->limit(5)
                    ->all();
                $remboursements = models\Remboursement::find()->orderBy('created_at')
                    ->limit(5)
                    ->all();
                $socials = models\Social::find()->orderBy('created_at')
                    ->limit(5)
                    ->all();
                $sessions = models\Session::find()->orderBy('date')
                    ->limit(5)
                    ->all();
                $gains = models\Gains::find()->orderBy('created_at')
                    ->where("getter_id='" . $userid . "'")
                    ->limit(5)
                    ->all();

                $rappels = models\Emprunt::find()
                    ->all();
                foreach ($rappels as $rappel) {

                    $date = new DateTime($rappel->created_at);
                    $date->add(new DateInterval('P' . $rappel->delay . 'M'));
                    date_default_timezone_set('Europe/Paris');

                    $cond = ($date->format('Y-m-d H:i:s') > date("Y-m-d H:i:s"));

                    if ($date->format('Y-m-d H:i:s') < date("Y-m-d H:i:s")) {

                        $command = $connection->createCommand('UPDATE user SET is_active=0 WHERE id=' . $rappel->user_id . '');

                        $command->execute();

                    }
                    $r = $rappel->states + 1;
                    $dates = new DateTime($rappel->created_at);

                    // $emprunt = date("Y-m-d H:i:s");
                    if (date("Y-m-d H:i:s") > $dates->add(new DateInterval('P' . $rappel->states . 'M'))->format('Y-m-d H:i:s')
                    ) {

                        $commande = $connection->createCommand('UPDATE emprunt SET states=' . $r . ' WHERE user_id=' . $rappel->user_id . '');
                        $commande->execute();
                        $commande = $connection->createCommand('UPDATE emprunt SET amount=' . $rappel->amount * (1 + ($rappel->percentage / 100)) . ' WHERE id=' . $rappel->id . '');
                        $commande->execute();

                    }

                }

                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollback();
            }

            return $this->render('index', [
                'model' => $model, 'epargne' => $epargne, 'social' => $social, 'gain' => $gain,
                'emprunt' => $emprunt, 'epargnes' => $epargnes, 'socials' => $socials, 'gains' => $gains,
                'emprunts' => $emprunts, 'retraits' => $retraits, 'sessions' => $sessions, 'remboursements' => $remboursements,
            ]);
        }

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }
    public function actionBilan()
    {$connection = \Yii::$app->db;

        $model = models\User::find()
            ->all();

        $connection = \Yii::$app->db;

        try { $transaction = $connection->beginTransaction();

            $userid = Yii::$app->user->identity->id;

            $emprunts = models\Emprunt::find()
            ;
            $emprunt = $emprunts->sum('amount');

            $epargnes = models\Epargne::find()
            ;
            $epargne = $epargnes->sum('money');

            $social = Yii::$app->user->identity->social_font;

            $gains = models\Gains::find()
            ;
            $gain = $gains->sum('gain');

            foreach ($model as $user) {
                $userid = $user->id;
                $array = null;
                $array[] = $user->image;
                $array[] = $user->username;

                $emprunts = models\Emprunt::find()
                    ->where("user_id='" . $userid . "'");
                $emprunt = $emprunts->sum('amount');
                $array[] = $emprunt;
                $epargnes = models\Epargne::find()
                    ->where("user_id='" . $userid . "'");
                $epargne = $epargnes->sum('money');
                $array[] = $epargne;
                $social = Yii::$app->user->identity->social_font;
                $array[] = $social;
                $gains = models\Gains::find()
                    ->where("getter_id='" . $userid . "'");
                $gain = $gains->sum('gain');
                $array[] = $social;

                $arrays[] = $array;} //$arrays[] = ["hj"];

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
        }
        return $this->render('bilan', [
            'model' => $model, 'arrays' => $arrays, 'epargne' => $epargne, 'social' => $social, 'gain' => $gain,
            'emprunt' => $emprunt,
        ]);

    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

}
