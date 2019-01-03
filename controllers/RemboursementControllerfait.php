<?php

namespace app\controllers;

use app\models;
use app\models\Remboursement;
use app\models\RemboursementSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

$connection = \Yii::$app->db;

/**
 * RemboursementController implements the CRUD actions for Remboursement model.
 */
class RemboursementController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Remboursement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RemboursementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Remboursement model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Remboursement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Remboursement();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $transaction = $connection->beginTransaction();
            try {
                $emprunt = Emprunt::find($model->emprunt_id);
                $pourcentage = $emprunt->percentage;
                $epargnes = Epargne::find()->all();
                $total = $epargnes->sum('amount');
                foreach ($epargnes as $epargne) {
                    $gain = new Gains();
                    $gain->loadDefaultValues();
                    $gain->remboursement_id = $model->id;
                    $gain->getter_id = $epargne->user_id;
                    $gain->gain = ($epargne->amount * $model->amount) * $emprunt->percentage / $total;

                    $gain->save();
                }

                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollback();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Remboursement model.
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
     * Deletes an existing Remboursement model.
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
     * Finds the Remboursement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Remboursement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Remboursement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
