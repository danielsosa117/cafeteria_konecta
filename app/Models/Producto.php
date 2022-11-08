<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $nombre
 * @property $referencia
 * @property $precio
 * @property $peso
 * @property $categoria
 * @property $stock
 *
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{

    static $rules = [
		'nombre' => 'required',
		'referencia' => 'required',
		'precio' => 'required',
		'peso' => 'required',
		'categoria' => 'required',
		'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','referencia','precio','peso','categoria','stock'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }


}
