

<style>
.btn-primary {
    color: #fff;
    background-color: #428bca;
    border-color: #357ebd;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
</style>
    <link href="recursos/css/font-awesome.css" rel="stylesheet">
    <link href="recursos/css/animate.min.css" rel="stylesheet">
    <link href="recursos/css/owl.carousel.css" rel="stylesheet">
    <link href="recursos/css/owl.theme.css" rel="stylesheet">
<section id="navigation-main">  
<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
			<?php 
              
              $total_productos=0;
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {


    $total_productos += $position->getQuantity(); //2
} 
                        $usuarios = CHtml::listData(Usuario::model()->findAll(array(
    'condition'=>'username=:name',
    'params'=> array(':name'=>Yii::app()->user->name),
)),'id_tipo_usuario', 'id_tipo_usuario');
$id_user_conectado = ''; 
foreach($usuarios as $usuario){
    $id_user_conectado = $usuario; 
}

function visible($id_user_conectado) {
    if ($id_user_conectado == 3 && !Yii::app()->user->isGuest) {
        return true;
    } else {
        return false;
    }
}

function visibleProductor($id_user_conectado) {
    if ($id_user_conectado == 1 && !Yii::app()->user->isGuest) {
        return true;
    } else {
        return false;
    }
}

function visibleCliente($id_user_conectado) {
    if ($id_user_conectado == 2 && !Yii::app()->user->isGuest) {
        return true;
    } else {
        return false;
    }
}
                        
                        
                        $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
						/*array('label'=>'Home <span class="caret"></span>', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"our home page"), 
                        'items'=>array(
                            array('label'=>'Home 1 - Nivoslider', 'url'=>array('/site/index')),
							array('label'=>'Home 2 - Bootstrap carousal', 'url'=>array('/site/page', 'view'=>'home2')),
							array('label'=>'Home 3 - Piecemaker2', 'url'=>array('/site/page', 'view'=>'home3')),
							array('label'=>'Home 4 - Static image', 'url'=>array('/site/page', 'view'=>'home4')),
							array('label'=>'Home 5 - Video header', 'url'=>array('/site/page', 'view'=>'home5')),
							array('label'=>'Home 6 - Without slider', 'url'=>array('/site/page', 'view'=>'home6')),
                        )),
						array('label'=>'Styles <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"6 styles"), 
                        'items'=>array(
                            array('label'=>'<span class="style" style="background-color:#0088CC;"></span> Style 1', 'url'=>"javascript:chooseStyle('none', 60)"),
							array('label'=>'<span class="style" style="background-color:#e42e5d;"></span> Style 2', 'url'=>"javascript:chooseStyle('style2', 60)"),
							array('label'=>'<span class="style" style="background-color:#c80681;"></span> Style 3', 'url'=>"javascript:chooseStyle('style3', 60)"),
							array('label'=>'<span class="style" style="background-color:#51a351;"></span> Style 4', 'url'=>"javascript:chooseStyle('style4', 60)"),
							array('label'=>'<span class="style" style="background-color:#b88006;"></span> Style 5', 'url'=>"javascript:chooseStyle('style5', 60)"),
							array('label'=>'<span class="style" style="background-color:#f9630f;"></span> Style 6', 'url'=>"javascript:chooseStyle('style6', 60)"),
                        )),*/
						
						array('label'=>'Mantenedores <span class="caret"></span>', 'url'=>array('/site/page', 'view'=>'columns'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Producto', 'url'=>array('/producto/admin')),
							array('label'=>'Imagen Producto', 'url'=>array('/imagenProducto/admin')),
							array('label'=>'Valoración Producto', 'url'=>array('/valoralizacionProducto/admin')),
                            array('label'=>'Compras', 'url'=>array('/compra/admin')),
                            array('label'=>'Detalle Compra', 'url'=>array('/detalleCompra/admin')),
                            array('label'=>'Valoración Compra', 'url'=>array('/valoralizacionCompra/admin')),
                            array('label'=>'Usuario', 'url'=>array('/usuario/admin')),
                            array('label'=>'Categoria', 'url'=>array('/categoria/admin')),
                            array('label'=>'Tipo de usuario', 'url'=>array('/tipoUsuario/admin')),
                            array('label'=>'Comuna', 'url'=>array('/comuna/admin')),


                        ),
                        'visible' => visible($id_user_conectado)
                         ),
                        array('label'=>'Administrar rutas', 'url'=>array('/compra/adminruta'), 'visible' => visible($id_user_conectado)),

                        array('label'=>'Usuarios', 'url'=>array('/usuario/admin'), 'visible' => visible($id_user_conectado)),
                        array('label'=>'Listado de Productos', 'url'=>array('/producto/index2'),),
                        array('label'=>'Mis compras', 'url'=>array('/compra/miscompras'),'visible' => visibleProductor($id_user_conectado)||visibleCliente($id_user_conectado)),

                        array('label'=>'Registrar cuenta', 'url'=>array('/usuario/registrar'),'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Administrar productos', 'url'=>array('/producto/adminproductor'),'visible'=>visibleProductor($id_user_conectado)),

                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),),
                       
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                        
                    ),
                )); ?>
              
    	</div>
        <?php echo CHtml::link('<i class="fa fa-shopping-cart" style="margin-top: 8px"></i>&nbsp;<h5 style="font-size: 10px; float: right;" id="totalproductos">('.$total_productos.')</h5>', array('producto/detallecarro'), array('class'=> 'btn btn-large btn-primary', 'style' => 'float:right'));?>
        
    </div>
	</div>
</div>
</section><!-- /#navigation-main -->