<?php

namespace app\controllers;

use app\models;
use app\models\Retrait;
use app\models\RetraitSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * RetraitController implements the CRUD actions for Retrait model.
 */
class RetraitController extends Controller
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
     * Lists all Retrait models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RetraitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Retrait model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {$connection = \Yii::$app->db;

        $model = $this->findModel($id);

        $transaction = $connection->beginTransaction();
        $b = 0;
        try {
            $epargnes = models\Epargne::findBySql('select * from epargne where user_id=' . $model->user_id . '');

/*$total = $epargnes->sum('money');
if ($total < $model->money) {
return $this->render('create', [
'model' => $this->findModel($id),
]);

}*/
            $epargnes = $epargnes->all();
            $b = $model->money;

            foreach ($epargnes as $epargne) {
                $epargne->money = $epargne->money - $b;
                /*  if ($a >= 0) {
                $epargne->save();
                break;

                }
                $b = $a;
                $epargne->money = 0;*/
                $epargne->save();

            }

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Retrait model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Retrait();
        $model->loadDefaultValues();
        /* $epargnes = models\Epargne::findBySql('select * from epargne where user_id=' . $model->user_id . '');

        $total = $epargnes->sum('money');
        if ($total < $model->money) {
        return $this->render('update', [
        'model' => $this->findModel($id),
        ]);

        }*/

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Retrait model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        /*$epargnes = models\Epargne::findBySql('select * from epargne where user_id=' . $model->user_id . '');

        $total = $epargnes->sum('money');
        if ($total < $model->money) {
        return $this->render('update', [
        'model' => $this->findModel($id),
        ]);

        }*/

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Retrait model.
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
     * Finds the Retrait model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Retrait the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Retrait::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
