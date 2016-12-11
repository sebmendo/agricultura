<?php

/**
 * This is the model class for table "compra".
 *
 * The followings are the available columns in table 'compra':
 * @property integer $id_compra
 * @property string $fecha
 * @property string $precio_total
 * @property string $observacion
 *
 * The followings are the available model relations:
 * @property DetalleCompra[] $detalleCompras
 * @property ValoralizacionCompra[] $valoralizacionCompras
 */
class Compra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('precio_total,costo_distribucion', 'required'),
			array('precio_total', 'length', 'max'=>10),
			array('costo_distribucion,estado_compra', 'length', 'max'=>11),

			array('observacion', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_compra, id_usuario, fecha, precio_total, observacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'detalleCompras' => array(self::HAS_MANY, 'DetalleCompra', 'id_compra'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
			'valoralizacionCompras' => array(self::HAS_MANY, 'ValoralizacionCompra', 'id_compra'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_compra' => 'Transaccion',
			'fecha' => 'Fecha',
			'costo_distribucion'=> 'Costo de distribucion',
			'precio_total' => 'Precio Total',
			'observacion' => 'Observacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_compra',$this->id_compra);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('precio_total',$this->precio_total,true);
		$criteria->compare('observacion',$this->observacion,true);
	    $criteria->compare('costo_distribucion',$this->observacion,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Compra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
