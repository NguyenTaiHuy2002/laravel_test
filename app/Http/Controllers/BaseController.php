<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    
    abstract class BaseController extends Controller
    {
        protected $service;

        // Lây ra danh sách
        public function index(Request $request)
        {
            $params = $request->all();
            $data = $this->service->getList($params, $request->input('per_page', 10));
            return response()->json($data);
        }

        // Tạo mới
        public function store(Request $request)
        {
            $data = $this->service->create($request->all());
            return response()->json($data, 201);
        }

        // Xem chi tiết
        public function show($id)
        {
            $data = $this->service->find($id);
            if ($data) {
                return response()->json($data);
            }
            return response()->json(['message' => 'Not Found'], 404);
        }

        // Cập nhật
        public function update(Request $request, $id)
        {
            $data = $this->service->update($id, $request->all());
            if ($data) {
                return response()->json($data);
            }
            return response()->json(['message' => 'Not Found'], 404);
        }

        // Xoá bản ghi
        public function deleted($id)
        {
            $deleted = $this->service->delete($id);
            if ($deleted) {
                return response()->json(['message' => 'Deleted']);
            }
            return response()->json(['message' => 'Not Found'], 404);
        }
    }
?>