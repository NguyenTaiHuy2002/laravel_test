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
    
            if (!empty($params['filter'])) {
                $query->filter($params['filter']);
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