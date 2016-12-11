<?php

class ProductoController extends Controller {

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
                'actions' => array('index', 'view', 'index2', 'delete', 'indexfiltro', 'addToCart', 'addToCart2', 'detallecarro', 'eliminarproductocarrobyid', 'total', 'adminproductor', 'busqueda', 'vacio', 'busquedafiltro', 'vaciofiltro'),
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
    public function actionCreate() {
        $model = new Producto;
        $categorias = Categoria::model()->findAll();


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Producto'])) {

            $model->attributes = $_POST['Producto'];
            $images = CUploadedFile::getInstancesByName('images');
            $usuario = Usuario::model()->find(array(
                'condition' => 'username=:name',
                'params' => array(':name' => Yii::app()->user->name),
                    ), 'id_tipo_usuario', 'id_tipo_usuario');

            $model->id_usuario = $usuario->id_usuario;

            // proceed if the images have been set
            if (isset($images) && count($images) > 0) {
                // go through each uploaded image
                if ($model->save()) {
                    foreach ($images as $image) {
                        echo $image->name . '<br />';
                        if ($image->saveAs(Yii::getPathOfAlias('webroot') . '/images/' . $image->name)) {
                            // add it to the main model now
                            $img_add = new ImagenProducto();
                            $img_add->nombre_imagen = $image->name;
                            $img_add->id_producto = $model->id_producto;
                            $img_add->save();
                            echo $img_add->nombre_imagen;
                        }
                    }
                    return $this->redirect(array('view', 'id' => $model->id_producto));
                }
            } else {
                Yii::app()->user->setFlash('error', 'Debe seleccionar una imagen para registrar el producto');
                return $this->render('create', array(
                            'model' => $model,
                            'categorias' => $categorias,
                ));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'categorias' => $categorias,
        ));
    }

    public function actionTotal() {
        $position = $_POST['posicion'];
        $cantidad = $_POST['cantidad'];
        if ($cantidad != 0) {
            $cart = Yii::app()->shoppingCart;
            $cart->update($cart->positions[$position], $cantidad);
        }
        $total_productos = 0;
        $positions = Yii::app()->shoppingCart->getPositions();
        foreach ($positions as $position) {
            $total_productos += $position->getQuantity(); //2
        }
        echo $total_productos;
    }

    public function actionBusquedafiltro() {
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $productos = '';
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_tipo_usuario', 'id_tipo_usuario');
        $id_tipo_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_tipo_usuario = $usuario;
        }
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_usuario', 'id_usuario');
        $id_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_usuario = $usuario;
        }
        $criteria = new CDbCriteria();
        if ($id_tipo_usuario == 1 && !Yii::app()->user->isGuest) {
            $criteria->addCondition('t.id_usuario != :id_usuario');
            $criteria->addCondition('t.id_categoria = :id_categoria');
            $criteria->params = array(':id_usuario' => $id_usuario, ':id_categoria' => $categoria);
        } else {
            $criteria->addCondition('t.id_categoria = :id_categoria');
            $criteria->params = array(':id_categoria' => $categoria);
        }


        $productos = Producto::model()->findAll($criteria);

        foreach ($productos as $producto) {
            $val = ValoralizacionProducto::model()->findAll(array(
                'condition' => 'id_producto=:id',
                'params' => array('id' => $producto->id_producto),
            ));
            $cantidad = 0;
            $suma = 0;
            $total = '';
            //echo '<a href="#">';
            if (count($val) > 0) {
                foreach ($val as $valorizacion) {
                    $suma = $suma + $valorizacion->valoralizacion;
                    $cantidad++;
                }
                $total = $suma / $cantidad;
            } else {
                $total = 0;
            }
            $posicion_coincidencia = strripos($producto['nombre_producto'], $nombre);
            if ($posicion_coincidencia === false) {
                
            } else {
                $imagen_producto = ImagenProducto::model()->find('id_producto=:id_producto', array(':id_producto' => $producto['id_producto']));
                echo $producto['id_producto'] . '/' . $producto['nombre_producto'] . '/' . $producto['precio_producto'] . '/' . $imagen_producto->nombre_imagen . '/' . $producto['detalle'] . '/' . $producto['stock'] . '/' . $total . '/';
            }
        }
    }

    public function actionVaciofiltro() {
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $productos = '';
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_tipo_usuario', 'id_tipo_usuario');
        $id_tipo_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_tipo_usuario = $usuario;
        }
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_usuario', 'id_usuario');
        $id_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_usuario = $usuario;
        }
        $criteria = new CDbCriteria();
        if ($id_tipo_usuario == 1 && !Yii::app()->user->isGuest) {
            $criteria->addCondition('t.id_usuario != :id_usuario');
            $criteria->addCondition('t.id_categoria = :id_categoria');
            $criteria->params = array(':id_usuario' => $id_usuario, ':id_categoria' => $categoria);
        } else {
            $criteria->addCondition('t.id_categoria = :id_categoria');
            $criteria->params = array(':id_categoria' => $categoria);
        }


        $productos = Producto::model()->findAll($criteria);
        foreach ($productos as $producto) {
            $val = ValoralizacionProducto::model()->findAll(array(
                'condition' => 'id_producto=:id',
                'params' => array('id' => $producto->id_producto),
            ));
            $cantidad = 0;
            $suma = 0;
            $total = '';
            //echo '<a href="#">';
            if (count($val) > 0) {
                foreach ($val as $valorizacion) {
                    $suma = $suma + $valorizacion->valoralizacion;
                    $cantidad++;
                }
                $total = $suma / $cantidad;
            } else {
                $total = 0;
            }
            $imagen_producto = ImagenProducto::model()->find('id_producto=:id_producto', array(':id_producto' => $producto['id_producto']));
            echo $producto['id_producto'] . '/' . $producto['nombre_producto'] . '/' . $producto['precio_producto'] . '/' . $imagen_producto->nombre_imagen . '/' . $producto['detalle'] . '/' . $producto['stock'] . '/' . $total . '/';
        }
    }

    public function actionBusqueda() {
        $nombre = $_POST['nombre'];
        /*
          $criteria=new CDbCriteria();
          $criteria->order = 'id_producto ASC';

          $count=Producto::model()->count($criteria);
          $pages=new CPagination($count);

          // results per page
          $pages->pageSize=9;
          $pages->applyLimit($criteria); */
        $productos = '';
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_tipo_usuario', 'id_tipo_usuario');
        $id_tipo_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_tipo_usuario = $usuario;
        }
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_usuario', 'id_usuario');
        $id_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_usuario = $usuario;
        }
        if ($id_tipo_usuario == 1 && !Yii::app()->user->isGuest) {

            $productos = Producto::model()->findAll(array(
                'condition' => 'id_usuario!=:id_usuario',
                'params' => array(':id_usuario' => $id_usuario),
            ));
        } else {
            $productos = Producto::model()->findAll();
        }
        foreach ($productos as $producto) {
            $val = ValoralizacionProducto::model()->findAll(array(
                'condition' => 'id_producto=:id',
                'params' => array('id' => $producto->id_producto),
            ));
            $cantidad = 0;
            $suma = 0;
            $total = '';
            //echo '<a href="#">';
            if (count($val) > 0) {
                foreach ($val as $valorizacion) {
                    $suma = $suma + $valorizacion->valoralizacion;
                    $cantidad++;
                }
                $total = $suma / $cantidad;
            } else {
                $total = 0;
            }
            $posicion_coincidencia = strripos($producto['nombre_producto'], $nombre);
            if ($posicion_coincidencia === false) {
                
            } else {
                $imagen_producto = ImagenProducto::model()->find('id_producto=:id_producto', array(':id_producto' => $producto['id_producto']));
                echo $producto['id_producto'] . '/' . $producto['nombre_producto'] . '/' . $producto['precio_producto'] . '/' . $imagen_producto->nombre_imagen . '/' . $producto['detalle'] . '/' . $producto['stock'] . '/' . $total . '/';
            }
        }
    }

    public function actionVacio() {
        $nombre = $_POST['nombre'];

        $criteria = new CDbCriteria();
        $criteria->order = 'id_producto ASC';

        $count = Producto::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 9;
        $pages->applyLimit($criteria);
        $productos = '';
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_tipo_usuario', 'id_tipo_usuario');
        $id_tipo_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_tipo_usuario = $usuario;
        }
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_usuario', 'id_usuario');
        $id_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_usuario = $usuario;
        }
        if ($id_tipo_usuario == 1 && !Yii::app()->user->isGuest) {
            $productos = Producto::model()->findAll(array(
                'condition' => 'id_usuario!=:id_usuario',
                'params' => array(':id_usuario' => $id_usuario),
                    ), $criteria);
        } else {
            $productos = Producto::model()->findAll($criteria);
        }

        foreach ($productos as $producto) {
            $val = ValoralizacionProducto::model()->findAll(array(
                'condition' => 'id_producto=:id',
                'params' => array('id' => $producto->id_producto),
            ));
            $cantidad = 0;
            $suma = 0;
            $total = '';
            //echo '<a href="#">';
            if (count($val) > 0) {
                foreach ($val as $valorizacion) {
                    $suma = $suma + $valorizacion->valoralizacion;
                    $cantidad++;
                }
                $total = $suma / $cantidad;
            } else {
                $total = 0;
            }
            $imagen_producto = ImagenProducto::model()->find('id_producto=:id_producto', array(':id_producto' => $producto['id_producto']));
            echo $producto['id_producto'] . '/' . $producto['nombre_producto'] . '/' . $producto['precio_producto'] . '/' . $imagen_producto->nombre_imagen . '/' . $producto['detalle'] . '/' . $producto['stock'] . '/' . $total . '/';
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $categorias = Categoria::model()->findAll();


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Producto'])) {
            $model->attributes = $_POST['Producto'];

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_producto));
        }

        $this->render('update', array(
            'model' => $model, 'categorias' => $categorias,
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
        $dataProvider = new CActiveDataProvider('Producto');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionIndex2() {

        $categorias = Categoria::model()->findAll();

        $criteria = new CDbCriteria();
        $criteria->order = 'id_producto ASC';

        $count = Producto::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 9;
        $pages->applyLimit($criteria);

        $productos = '';
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_tipo_usuario', 'id_tipo_usuario');
        $id_tipo_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_tipo_usuario = $usuario;
        }
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_usuario', 'id_usuario');
        $id_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_usuario = $usuario;
        }
        if ($id_tipo_usuario == 1 && !Yii::app()->user->isGuest) {
            $productos = Producto::model()->findAll(array(
                'condition' => 'id_usuario!=:id_usuario',
                'params' => array(':id_usuario' => $id_usuario),
                    ), $criteria);
        } else {
            $productos = Producto::model()->findAll($criteria);
        }
        $this->render('index2', array(
            'productos' => $productos,
            'categorias' => $categorias,
            'pages' => $pages,
        ));
    }

    public function actionAddToCart($id_producto) {
        $producto = Producto::model()->findByPk($id_producto);
        if ($producto) {
            Yii::app()->shoppingCart->put($producto);
            Yii::app()->user->setFlash('success', 'El producto se ha agregado exitosamente a su carro de compras');
            return $this->redirect(['index2']);
        }
    }

    public function actionAddToCart2($posicion, $cantidad) {
        $producto = Producto::model()->findByPk($posicion);
        if ($producto) {
            for ($i = 0; $i < $cantidad; $i++) {
                Yii::app()->shoppingCart->put($producto);
            }
            Yii::app()->user->setFlash('success', 'se han agregado' . $cantidad . ' productos exitosamente a su carro de compras', array('style' => 'width: 30px'));
            return $this->redirect(['index2']);
        }
    }

    public function actionIndexfiltro($id_categoria) {

        $productos = '';
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_tipo_usuario', 'id_tipo_usuario');
        $id_tipo_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_tipo_usuario = $usuario;
        }
        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
                            'condition' => 'username=:name',
                            'params' => array(':name' => Yii::app()->user->name),
                        )), 'id_usuario', 'id_usuario');
        $id_usuario = '';
        foreach ($usuarios as $usuario) {
            $id_usuario = $usuario;
        }
        $criteria = new CDbCriteria();
        if ($id_tipo_usuario == 1 && !Yii::app()->user->isGuest) {
            $criteria->addCondition('t.id_usuario != :id_usuario');
            $criteria->addCondition('t.id_categoria = :id_categoria');
            $criteria->params = array(':id_usuario' => $id_usuario, ':id_categoria' => $id_categoria);
        } else {
            $criteria->addCondition('t.id_categoria = :id_categoria');
            $criteria->params = array(':id_categoria' => $id_categoria);
        }

        $criteria->order = 'id_producto ASC';
        $count = Producto::model()->count('id_categoria=:id_categoria', array(':id_categoria' => $id_categoria));
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 9;
        $pages->applyLimit($criteria);

        $productos = Producto::model()->findAll($criteria);

        $categorias = Categoria::model()->findAll();
        return $this->render('indexfiltro', [
                    'categorias' => $categorias,
                    'productos' => $productos,
                    'id_categoria' => $id_categoria,
                    'pages' => $pages,
        ]);
    }

    public function actionDetallecarro() {


        return $this->render('detallecarro');
    }

    public function actionEliminarproductocarrobyid($id) {



        $producto = Producto::model()->findByPk($id);
        if ($producto) {
            Yii::app()->shoppingCart->remove($producto->getId()); //no items
            Yii::app()->user->setFlash('success', 'El producto se ha agregado exitosamente a su carro de compras');
            return $this->redirect(['detallecarro']);
        }
        throw new NotFoundHttpException();
    }

    public function actionAdminproductor() {
        $model = new Producto2('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Producto2']))
            $model->attributes = $_GET['Producto2'];

        $this->render('admin2', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Producto('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Producto']))
            $model->attributes = $_GET['Producto'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Producto the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Producto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Producto $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'producto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
