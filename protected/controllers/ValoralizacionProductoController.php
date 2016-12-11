<?php

class ValoralizacionProductoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'valorizacioncompleta'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'create', 'update', 'view', 'delete', 'index'),
                'users' => CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'id_tipo_usuario=:postID',
                            'params' => array(':postID' => 3),
                        )), 'username', 'username'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id, $id_compra) {
        $model = new ValoralizacionProducto;
        $model->id_producto = $id;
        $model->id_compra = $id_compra;
        setlocale(LC_TIME, 'spanish');
        date_default_timezone_set("America/Santiago");
        $model->fecha= date('Y-m-d');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ValoralizacionProducto'])) {
            $model->attributes = $_POST['ValoralizacionProducto'];
            if ($model->save()) {
                $compra = Compra::model()->findByPk($id_compra);
                $detalle_compras = DetalleCompra::model()->findAll(array(
                    'condition' => 'id_compra=:id_compra',
                    'params' => array(':id_compra' => $id_compra),
                ));
                $this->redirect('index.php?r=compra/detallecompra&id='.$id_compra, array(
                    'detalle_compras' => $detalle_compras,
                    'compra' => $compra,
                ));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'id' => $id
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ValoralizacionProducto'])) {
            $model->attributes = $_POST['ValoralizacionProducto'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_valoralizacion_producto));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionValorizacioncompleta($id) {
        $model2 = Producto::model()->findByPk($id);
        $model = ValoralizacionProducto::model()->findAll(array(
            'condition' => 'id_producto=:id',
            'params' => array('id' => $id),
        ));
        $this->render('valorizacionporproducto', array(
            'model' => $model,
            'model2' => $model2,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ValoralizacionProducto');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ValoralizacionProducto('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ValoralizacionProducto']))
            $model->attributes = $_GET['ValoralizacionProducto'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ValoralizacionProducto the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ValoralizacionProducto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ValoralizacionProducto $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'valoralizacion-producto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
