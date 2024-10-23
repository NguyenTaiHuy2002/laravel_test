<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Product extends Model {

        use HasFactory; 

        protected $table = "products";

        protected $fillable = ['name', 'description', 'price'];

        public function scopeFilter($query, array $filters)
        {
            foreach ($filters as $field => $value) {
                if (!is_null($value)) {
                    $query->where($field, 'like', '%' . $value . '%');
                }
            }
            return $query;
        }
    }
?>