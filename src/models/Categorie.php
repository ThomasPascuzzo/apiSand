<?php
namespace lbs2017skeleton\models;
class Categorie extends \Illuminate\Database\Eloquent\Model {
    
    protected $table      = 'categorie';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    
    
    public function sandwichs() {
        return
        $this->belongsToMany('lbs2017skeleton\models\Sandwich',
            'sand2cat',
            'cat_id',
            'sand_id');
    }
}