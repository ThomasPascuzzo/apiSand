<?php
namespace lbs\models;
class Sandwich extends \Illuminate\Database\Eloquent\Model {
    
    protected $table      = 'sandwich';  
    protected $primaryKey = 'id';     
    public    $timestamps = false;   
    
    public function images() {
        return $this->hasMany('lbs\models\Image',
            's_id');
    }
    
    public function categories() {
        return
        $this->belongsToMany('lbs\models\Categorie',
            'sand2cat',
            'sand_id',
            'cat_id');
    }
    
    public function tailles() {
        return
        $this->belongsToMany('lbs\models\Taille',
            'tarif',
            'sand_id',
            'taille_id')
            ->withPivot(['prix'])
            ->as( 'tarif' )
        ;
    }
}