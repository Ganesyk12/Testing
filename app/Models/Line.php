<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class App\Models\Line;

class Line extends Model
{
   protected $connection = 'sqlsrv2';
   use HasFactory;
   protected $table = 'lines';
   protected $fillable = [
      'code', 'name', 'description', 'leader_id', 'plant_id', 'group_line_id', 'product',
      'manager_id', 'supervisor_id',
      'hanchou_a_id', 'hanchou_b_id', 'hanchou_c_id', 'hanchou_d_id',
      'leader_a_id', 'leader_b_id',   'leader_c_id', 'leader_d_id',
      'line_no', 'iot_ip_address'
   ];
}

// class App\Models\Lines;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lines extends Model
{
   use HasFactory;
   protected $table = "lines";
   protected $fillable = [
      'id_line',
      'nama_line',
      'NIK'
   ];
}

// class App\Models\GroupLine

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupLine extends Model
{
   protected $table = 'group_lines';
   protected $connection = 'sqlsrv2';

   protected $fillable = [
      'name', 'description'
   ];

   public function lines()
   {
      return $this->hasMany('App\Line');
   }
}

// Membuat 2 class model atau lebih