<?php

namespace App\Models\Shop;

use App\Filament\Resources\Shop\CustomerResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Tags\HasTags;

class Customer extends Model
{
    use HasFactory, HasTags;

    /**
     * @var string
     */
    protected $table = 'shop_customers';

    public static string $resource = CustomerResource::class;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'gender',
        'phone',
        'birthday',
    ];

    static public string $entity = 'Клиент';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'birthday' => 'date',
    ];

    public function addresses(): MorphToMany
    {
        return $this->morphToMany(Address::class, 'addressable');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'shop_customer_id', 'id');
    }

    public function payments(): HasManyThrough
    {
        return $this->hasManyThrough(Payment::class, Order::class, 'shop_customer_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'model_id', 'id')
            ->where('model_type', $this::class);
    }
}