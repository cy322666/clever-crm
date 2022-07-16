<?php

namespace App\Models\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'shop_tasks';

    protected $fillable = [
        'title',
        'text',
        'model_id',
        'model_type',
        'responsible_id',
        'type_id',
        'shop_id',
        'created_employee_id',
        'execute_at',
        'execute_to',
        'is_execute',
        'task_id',
        'is_failed',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'entity_id', 'id')
            ->where('entity_type', 'order');
    }

    //TODO employee -> user
    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id', 'id');
    }

    //TODO employee -> user
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'created_employee_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id', 'customer_id')
            ->where('model_type', Customer::class);
    }

    public function type()
    {
        return $this->hasOne(TaskType::class, 'id', 'type_id');
    }

    public static function generateId(): int
    {
        return rand(100000, 999999);
    }
}
