<?php
    namespace App\Services;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Arr;
    
    abstract class BaseService
    {
        protected $model;
    
        public function __construct(Model $model)
        {
            $this->model = $model;
        }
    
        // Get danh sách có phân trang
        public function getList(array $params = [], $perPage = 10)
        {
            $query = $this->model->newQuery();
    
            // Filter tự động
            if (!empty($params['filter'])) {
                foreach ($params['filter'] as $field => $value) {
                    if ($value !== null) {
                        $query->where($field, 'like', '%' . $value . '%');
                    }
                }
            }
    
            return $query->paginate($perPage);
        }
    
        //Tạo mới
        public function create(array $data)
        {
            return $this->model->create($data);
        }
    
        // Cập nhật
        public function update($id, array $data)
        {
            $record = $this->find($id);
            if ($record) {
                $record->update($data);
                return $record;
            }
            return null;
        }
    
        // Xóa
        public function delete($id)
        {
            $record = $this->find($id);
            if ($record) {
                return $record->delete();
            }
            return false;
        }
    
        // Chi tiết bản ghi
        public function find($id)
        {
            return $this->model->find($id);
        }
    }
    
?>