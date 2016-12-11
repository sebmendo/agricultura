<?php
/* @var $this CompraController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs = array(
    'Compras',
);
?>

<?php echo BsHtml::pageHeader('Mis compras') ?>
<link href="recursos/css/font-awesome.css" rel="stylesheet">
<link href="recursos/css/bootstrap.min.css" rel="stylesheet">
<link href="recursos/css/animate.min.css" rel="stylesheet">
<link href="recursos/css/owl.carousel.css" rel="stylesheet">
<link href="recursos/css/owl.theme.css" rel="stylesheet">
<div class="row">
    <div class="col-md-12" >
        <div class="box">



            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Transacción</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($compras as $compra) {
                            ?>

                            <tr>
                                <th><?php echo $compra->id_compra; ?></th>
                                <td><?php
                                    $date = date_create($compra->fecha);
                                    echo date_format($date, 'd-m-Y');
                                    ?></td>
                                <td>$<?php echo $compra->precio_total; ?></td>

                                <td style="width: 230px">
                                    <?php echo CHtml::link('Ver', array('compra/detallecompra', 'id' => $compra->id_compra), array('class' => 'btn btn-large btn-primary')); ?>
                                    <?php
                                    if ($compra->estado_compra == 0) {
                                        echo CHtml::link('Confirmar Recepción', array('Compra/confirmar', 'id' => $compra->id_compra), array('class' => 'btn btn-large btn-primary'));
                                    } else {
                                        
                                    }
                                    if ($compra->estado_compra == 1) {
                                        echo CHtml::link('Calificar Productos', array('compra/detallecompra', 'id' => $compra->id_compra), array('class' => 'btn btn-large btn-primary'));
                                    } else {
                                        
                                    }
                                    ?>                                  

                                </td>
                            </tr>

                            <?php
                        }
                        ?>






                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>