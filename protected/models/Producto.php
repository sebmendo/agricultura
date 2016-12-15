<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $id_producto
 * @property string $nombre_producto
 * @property string $precio_producto
 * @property string $detalle
 * @property integer $id_categoria
 * @property integer $id_usuario
 *
 * The followings are the available model relations:
 * @property DetalleCompra[] $detalleCompras
 * @property ImagenProducto[] $imagenProductos
 * @property Categoria $idCategoria
 * @property Usuario $idUsuario
 * @property ValoralizacionProducto[] $valoralizacionProductos
 */
class Producto extends CActiveRecord  implements IECartPosition {
  

    function getId(){
        return $this->id_producto;
    }

    function getPrice(){
        return $this->precio_producto;
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_producto, precio_producto, id_categoria, stock', 'required'),
			array('id_categoria, id_usuario, stock', 'numerical', 'integerOnly'=>true),
			array('nombre_producto', 'length', 'max'=>70),
			array('precio_producto', 'length', 'max'=>10),
			array('detalle', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_producto, nombre_producto, precio_producto, detalle, id_categoria, id_usuario', 'safe', 'on'=>'search'),
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
			'detalleCompras' => array(self::HAS_MANY, 'DetalleCompra', 'id_producto'),
			'imagenProductos' => array(self::HAS_MANY, 'ImagenProducto', 'id_producto'),
			'Categoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
			'Usuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
			'valoralizacionProductos' => array(self::HAS_MANY, 'ValoralizacionProducto', 'id_producto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_producto' => 'Id Producto',
			'nombre_producto' => 'Producto',
			'precio_producto' => 'Precio',
			'detalle' => 'Detalle',
			'stock'=>'Stock',

			'id_categoria' => 'Id Categoria',
			'id_usuario' => 'Id Usuario',
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

		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('nombre_producto',$this->nombre_producto,true);
		$criteria->compare('precio_producto',$this->precio_producto,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('stock',$this->stock,true);

		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_usuario',$this->id_usuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
