<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'user' => 'required',
    );

    public function selectProfileFindById($id) //IDから一件のデータを取得する
    {
        $query = $this->select([
            'id', 'user', 'photo_path', 'age', 'introduction'
        ])->where([
            'id' => $id
        ]);

        return $query->first(); //first()は一件のみ取得する関数

    }
    
}
