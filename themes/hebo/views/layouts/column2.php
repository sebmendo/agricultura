<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
  <div class="container">
  <div class="row-fluid">
	
    <div class="span12">

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
      'title'=>'Operations',
    ));
    $this->widget('zii.widgets.CMenu', array(
      'items'=>$this->menu,
      'htmlOptions'=>array('class'=>'operations'),
    ));
    $this->endWidget();
  ?>



        
        <!-- Include content pages -->
        <?php echo $content; ?>

	</div><!--/span-->
    
    <div class="span2">
		<?php include_once('tpl_sidebar.php');?>
		
    </div><!--/span-->
  </div><!--/row-->
</div>
</section>


<?php $this->endContent(); ?>