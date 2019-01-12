<?php

namespace app\controllers;

use app\models;
use app\models\Emprunt;
use app\models\Remboursement;
use app\models\RemboursementSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update', 'create', 'view', 'index'],
                'rules' => [
                    [
                        'actions' => ['create', 'update'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['member'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'create' => ['POST', 'GET'],
                    'update' => ['POST', 'GET'],
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
    {$connection = \Yii::$app->db;

        $model = $this->findModel($id);

        $transaction = $connection->beginTransaction();
        try {
            $emprunt = models\Emprunt::findOne($model->emprunt_id);
            $emprunt->amount = $emprunt->amount - $model->amount;
            $emprunt->save();
            /* if ($emprunt->amount <= 0) {
            $conn = $connection->createCommand()
            ->delete('emprunt', 'id=' . $model->emprunt_id)
            ->execute();

            }*/

            $pourcentage = $emprunt->percentage;
            $created_at = $emprunt->created_at;
            $epargnes = models\Epargne::find()
                ->where("created_at<='" . $created_at . "'");
            //   ->where("created_at >= \':cr eated_at\'', [':created_at' => $created_at]);
            $total = $epargnes->sum('money');
            $epargnes = $epargnes->all();
            foreach ($epargnes as $epargne) {
                $gain = new models\Gains();
                $gain->loadDefaultValues();
                $gain->remboursement_id = $model->id;
                $gain->getter_id = $epargne->user_id;
                $gain->gain = ($epargne->money * $model->amount) * $emprunt->percentage / (100 * $total);
                $gain->save();
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
     * Creates a new Remboursement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {$connection = \Yii::$app->db;
        $model = new Remboursement();
        $model->loadDefaultValues();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $transaction = $connection->beginTransaction();

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
