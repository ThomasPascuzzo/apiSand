<?php
namespace lbs\models;

class Tarif extends \Illuminate\Database\Eloquent\Model {
	protected $table = 'tarif';
	protected $primaryKey = 'id';
	public $timestamps = false;
}