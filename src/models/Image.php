<?php
namespace lbs2017skeleton\models;
class Image extends \Illuminate\Database\Eloquent\Model {

    protected $table      = 'image';
    protected $primaryKey = 'id';
    public    $timestamps = false;

    public function sandwich() {
        return $this->belongsTo('clbs2017skeleton\models\Sandwich',
            's_id');
    }


}