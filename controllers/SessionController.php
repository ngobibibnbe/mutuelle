<?php

namespace app\controllers;

use app\models\Session;
use app\models\SessionSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * SessionController implements the CRUD actions for Session model.
 */
class SessionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update','create','view','index',],
                'rules' => [
                    [
                        'actions' => ['create','update',],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' =>['index','view',],
                        'allow' => true,
                        'roles' => ['member'],
                    ]
                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'create' => ['POST','GET'],
                    'update' => ['POST','GET']
                ],
            ],
        ];
    }

    /**
     * Lists all Session models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SessionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Session model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $epargne = new \app\models\Epargne();
        if ($epargne->load(Yii::$app->request->post()) && $epargne->save()) {
            return $this->redirect(['/epargne/view', 'id' => $epargne->id]);
        }
        $retrait = new \app\models\Retrait();
        if ($retrait->load(Yii::$app->request->post()) && $retrait->save()) {
            return $this->redirect(['/retrait/view', 'id' => $retrait->id]);
        }
        $emprunt = new \app\models\Emprunt();
        if ($emprunt->load(Yii::$app->request->post()) && $emprunt->save()) {
            return $this->redirect(['/emprunt/view', 'id' => $emprunt->id]);
        }
        $remboursement = new \app\models\Remboursement();
        if ($remboursement->load(Yii::$app->request->post()) && $remboursement->save()) {
            return $this->redirect(['/remboursement/view', 'id' => $remboursement->id]);
        }
        $social = new \app\models\Social();
        if ($social->load(Yii::$app->request->post()) && $social->save()) {
            return $this->redirect(['/social/view', 'id' => $social->id]);
        }

        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model, 'epargne' => new \app\models\Epargne(['session_id' => $model->id]),
            'remboursement' => new \app\models\Remboursement(['session_id' => $model->id]),
            'retrait' => new \app\models\Retrait(['session_id' => $model->id]),
            'emprunt' => new \app\models\Emprunt(['session_id' => $model->id]),
            'social' => new \app\models\Social(['session_id' => $model->id]),
        ]);
    }

    /**
     * Creates a new Session model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Session();
        $model->loadDefaultValues();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Session model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Session model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Session model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Session the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Session::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
