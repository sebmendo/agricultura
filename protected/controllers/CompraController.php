<?php

class CompraController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column2';

	/**
	* @return array action filters
	*/
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','miscompras','detallecompra','ruta','confirmar'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','verruta','adminruta','update','view', 'delete','index'),
				'users'=>CHtml::listData(Usuario::model()->findAll(array(
    'condition'=>'id_tipo_usuario=:postID',
    'params'=>array(':postID'=>3),
)),'username','username'),
                        ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		if(!Yii::app()->shoppingCart->isEmpty()){
                $model2=new LoginForm;
            $usuario=  Usuario::model()->find(array(
			    'condition'=>'username=:name',
			    'params'=> array(':name'=>Yii::app()->user->name),
				),'id_tipo_usuario', 'id_tipo_usuario');
                if(Yii::app()->user->isGuest){
                    Yii::app()->user->setFlash('error', 'Debe Iniciar Sesión para Comprar');
				    $this->redirect('index.php?r=site/login',array(
				    'model'=>$model2,
		              ));     
                }
				$model=new Compra;
				$model->costo_distribucion= 15000;//hay que cambiarlo cuando se utilicen los mapas
				$model->precio_total=Yii::app()->shoppingCart->getCost()+$model->costo_distribucion; 
				$model->id_usuario= $usuario->id_usuario;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

				if(isset($_POST['Compra']))
				{
					$model->attributes=$_POST['Compra'];
					date_default_timezone_set('America/Santiago');
       				$fecha_actual= getdate();
       				$fecha_hoy= date('Y-m-d', strtotime($fecha_actual['year'].'-'.$fecha_actual['mon'].'-'.$fecha_actual['mday']));
					$model->fecha=date("Y-m-d");
                   
					if($model->save()){

					foreach($positions = Yii::app()->shoppingCart->getPositions() as $position){
					    $producto = Producto::model()->find('id_producto=:id_producto',array(':id_producto'=>$position->id));
                        $disminuir_stock=Producto::model()->findByPk($position->id);
                        $disminuir_stock->stock = $disminuir_stock->stock - $position->getQuantity();
                        $disminuir_stock->save();
	                    $detalle_compra= new DetalleCompra();
	                    $detalle_compra->id_producto= $position->id;
	                    $detalle_compra->id_compra= $model->id_compra;
	                    $detalle_compra->precio=$position->getPrice();
	                    $detalle_compra->cantidad= $position->getQuantity();
	                    $detalle_compra->save();
                        
          //  echo $position->nombre_producto;
            //echo $position->quantity;
              //var_dump($position);
            		}
					 Yii::app()->shoppingCart->clear();
          			 Yii::app()->user->setFlash('info', 'El pedido se ha realizado correctamente');
            		 return $this->redirect(array('view','id'=>$model->id_compra));

						

					}
				}

				$this->render('create',array(
				'model'=>$model,
				));
		}else{

				$categorias=Categoria::model()->findAll();

		$criteria=new CDbCriteria();
		$criteria->order = 'id_producto ASC';

    	$count=Producto::model()->count($criteria);
    	$pages=new CPagination($count);

	    // results per page
	    $pages->pageSize=9;
	    $pages->applyLimit($criteria);
    	$productos=Producto::model()->findAll($criteria);

				Yii::app()->user->setFlash('error', 'El carro debe tener productos');
				$this->render('../producto/index2',array(
				'productos'=>$productos,
				'categorias'=>$categorias,
				'pages'=>$pages,
		));

		}
	
	}


	



	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Compra']))
		{
			$model->attributes=$_POST['Compra'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_compra));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        public function actionConfirmar($id){
            $model=$this->loadModel($id);
            $model->estado_compra = 1;
            $model->save();
            $usuario=  Usuario::model()->find(array(
    'condition'=>'username=:name',
    'params'=> array(':name'=>Yii::app()->user->name),
	),'id_tipo_usuario', 'id_tipo_usuario');

		 $compras=  Compra::model()->findAll(array(
            'condition'=>'id_usuario=:id_usuario',
                'params'=> array(':id_usuario'=>$usuario->id_usuario),
            ));


		$this->render('miscompras',array(
			'compras'=>$compras,
		));
        }

        /**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Compra');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


public function actionRuta()
	{

			$id_producto = $_POST['id_producto'];
			$producto = Producto::model()->findByPk($id_producto);


				 $usuario2 = Usuario::model()->findByPk($producto->id_usuario);
			      $comuna2= Comuna::model()->findByPk($usuario2->id_comuna);

			echo CJSON::encode($comuna2);		

		   

	}





	public function actionDetallecompra($id)
	{

		$compra= Compra::model()->findByPk($id);
		$detalle_compras=  DetalleCompra::model()->findAll(array(
            'condition'=>'id_compra=:id_compra',
                'params'=> array(':id_compra'=>$id),
            ));
		$this->render('detallecompra',array(
			'detalle_compras'=>$detalle_compras,
			'compra'=>$compra,
		));
	}





	public function actionVerruta($id)
	{

		$compra = Compra::model()->findByPk($id);
		$detalles_compras= DetalleCompra::model()->findAll(array(
            'condition'=>'id_compra=:id_compra',
                'params'=> array(':id_compra'=>$compra->id_compra),
            ));
		 $productos=  array();

  		foreach ($detalles_compras as $detalle_compra) {
				$producto = Producto::model()->findByPk($detalle_compra->id_producto);
 	
        	array_push($productos,$producto);
       }





		$this->render('verruta',array(
			'compra'=>$compra,
			'detalles_compras'=>$detalles_compras,
			'productos'=> $productos,

		));
	}

	public function actionMiscompras()
	{

	$usuario=  Usuario::model()->find(array(
    'condition'=>'username=:name',
    'params'=> array(':name'=>Yii::app()->user->name),
	),'id_tipo_usuario', 'id_tipo_usuario');

		 $compras=  Compra::model()->findAll(array(
            'condition'=>'id_usuario=:id_usuario',
                'params'=> array(':id_usuario'=>$usuario->id_usuario),
            ));


		$this->render('miscompras',array(
			'compras'=>$compras,
		));
	}
	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Compra('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Compra']))
			$model->attributes=$_GET['Compra'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdminruta()
	{
		$model=new Compra('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Compra']))
			$model->attributes=$_GET['Compra'];

		$this->render('adminruta',array(
			'model'=>$model,
		));
	}


	
	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer $id the ID of the model to be loaded
	* @return Compra the loaded model
	* @throws CHttpException
	*/
	public function loadModel($id)
	{
		$model=Compra::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    public function loadModelProducto($id)
	{
		$model=Producto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	* Performs the AJAX validation.
	* @param Compra $model the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='compra-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}