<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodak extends Model
{
   use HasFactory;
   // protected $connection = 'sqlsrv2';
   protected $fillable = [
      'id',
      'name',
      'price',
      'nama_proses',
      'klasifikasi_perubahan',
      'pelaksanaan2ndQA',
      'item_perubahan',
      'no_lembar_instruksi',
      'tanggal_produksi_saat_perubahan',
      'shiftt',
      'part_number_finish_good',
      'kualitas',
      'fakta_ng',
      'pcdt',
      'tanggal_perubahan_pcdt',
      'instruksi_kerja',
      'tanggal_perubahan_instruksi_kerja',
      'isir',
      'tanggal_perubahan_isir',
      'pemahaman',
      'ulasan',
      'id_line',
      'status',
      'reject_kakaricho',
      'status_mng_mfg',
      'reject_mng_mfg',
      'status_mng_qc',
      'reject_mng_qc',
      'status_gm',
      'reject_gm',
      'draft',
      'code',

   ];
   // public function lines(){
   //     return $this->belongsTo(Lines::class);
   // }

   // protected $table = 'lines';
   // protected $fillable = [
   //     'code', 'name', 'description', 'leader_id', 'plant_id', 'group_line_id', 'product',
   //     'manager_id', 'supervisor_id',
   //     'hanchou_a_id', 'hanchou_b_id', 'hanchou_c_id','hanchou_d_id',
   //     'leader_a_id', 'leader_b_id',   'leader_c_id', 'leader_d_id',
   //     'line_no', 'iot_ip_address'
   // ];



   // //Relation to user as MANAGER
   public function Line()
   {
      return $this->belongsTo(Line::class, 'id_lines');
   }
   // //Relation to user as SUPERVISOR
   // public function supervisor()
   // {
   //     return $this->belongsTo('App\User', 'supervisor_id');
   // }

   // //Relation to user as HANCHOU A
   // public function hanchou_a()
   // {
   //     return $this->belongsTo('App\User', 'hanchou_a_id');
   // }

   // //Relation to user as HANCHOU B
   // public function hanchou_b()
   // {
   //     return $this->belongsTo('App\User', 'hanchou_b_id');
   // }

   // //Relation to user as HANCHOU C
   // public function hanchou_c()
   // {
   //     return $this->belongsTo('App\User', 'hanchou_c_id');
   // }

   // public function hanchou_d()
   // {
   //     return $this->belongsTo('App\User', 'hanchou_d_id');
   // }

   // //Relation to user as LEADER A
   // public function leader_a()
   // {
   //     return $this->belongsTo('App\User', 'leader_a_id');
   // }

   // //Relation to user as LEADER B
   // public function leader_b()
   // {
   //     return $this->belongsTo('App\User', 'leader_b_id');
   // }

   // public function leader_C()
   // {
   //     return $this->belongsTo('App\User', 'leader_c_id');
   // }

   // //Relation to user as LEADER D
   // public function leader_d()
   // {
   //     return $this->belongsTo('App\User', 'leader_d_id');
   // }


   // //Relation to Plant
   // public function plant()
   // {
   //     return $this->belongsTo(Plant::class, 'plant_id');
   // }

   // //Relation to GroupLine
   // public function group_line()
   // {
   //     return $this->belongsTo('App\Models\GroupLine', 'foreign_key', 'local_key');
   // }


   // //Relation to Machine
   // public function machines()
   // {
   //     return $this->hasMany('App\Machine');
   // }

   // //Relation to UsedProcessAbiltiyCheckSheetMaster
   // public function used_process_abiltiy_check_sheet_masters()
   // {
   //     return $this->hasMany('App\UsedProcessAbiltiyCheckSheetMaster');
   // }

   // //relation to ProductionOutput model
   // public function production_outputs()
   // {
   //     return $this->hasMany('App\ProductionOutput');
   // }


   // //relation to LossTime model
   // public function loss_times()
   // {
   //     return $this->hasMany('App\LossTime');
   // }

   // //relation to AttendanceAndExclusion model
   // public function attendance_and_exclusions()
   // {
   //     return $this->hasMany('App\AttendanceAndExclusion');
   // }

   // //relation to MonthlyProductionPlan model
   // public function monthly_production_plans()
   // {
   //     return $this->hasMany('App\MonthlyProductionPlan');
   // }

   // //relation to StandardKousu model
   // public function standard_kousus()
   // {
   //     return $this->hasMany('App\StandardKousu');
   // }

   // //relation to LineTargetStandardKousu model
   // public function line_target_standard_kousus()
   // {
   //     return $this->hasMany('App\LineTargetStandardKousu');
   // }

   // //relation to LineTargetInlineDefect model
   // public function line_target_inline_defects()
   // {
   //     return $this->hasMany('App\LineTargetInlineDefect');
   // }

   // //relation to LineTargetFinalInspectionDefect model
   // public function line_target_final_inspection_defects()
   // {
   //     return $this->hasMany('App\LineTargetFinalInspectionDefect');
   // }

   // //relation to LineTargetProductivityRatio model
   // public function line_target_productivity_ratios()
   // {
   //     return $this->hasMany('App\LineTargetProductivityRatio');
   // }

   // //relation to InlineDefect model
   // public function inline_defects()
   // {
   //     return $this->hasMany('App\InlineDefect');
   // }

   // //relation to master data inline defect model
   // public function master_data_inline_defects()
   // {
   //     return $this->hasMany('App\MasterDataInlineDefect');
   // }

   // //relation to master data final inspection defect model
   // public function master_data_final_inspection_defects()
   // {
   //     return $this->hasMany('App\MasterDataFinalInspectionDefect');
   // }
}


    // You can also define relationships, custom methods, or other configurations here