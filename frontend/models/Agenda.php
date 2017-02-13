<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenda".
 *
 * @property integer $id
 * @property string $id_ruang
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $tanggal_input
 * @property string $tanggal_verifikasi
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ruang', 'tanggal_mulai', 'tanggal_selesai', 'tanggal_verifikasi'], 'required'],
            [['tanggal_mulai', 'tanggal_selesai', 'tanggal_input', 'tanggal_verifikasi'], 'safe'],
            [['id_ruang'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ruang' => 'Id Ruang',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'tanggal_input' => 'Tanggal Input',
            'tanggal_verifikasi' => 'Tanggal Verifikasi',
        ];
    }
}
