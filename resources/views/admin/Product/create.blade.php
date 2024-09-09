@extends('admin.main_admin')

@section('title', 'Thêm sản phẩm')

@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Thêm Sản Phẩm</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

            <!-- Tên sản phẩm -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                <input type="text" name="name" id="name" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Giá sản phẩm -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Giá thực</label>
                <input type="number" name="price" id="price" step="10" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Số lượng tồn kho -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Số lượng tồn kho</label>
                <input type="number" name="quantity" id="quantity" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Giá đã giảm</label>
                <input type="number" name="price" id="price_dis" step="10" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <!-- Thương hiệu -->
            <div>
                <label for="brand_id" class="block text-sm font-medium text-gray-700">Thương hiệu</label>
                <select name="brand_id" id="brand_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Chọn thương hiệu</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Nhà cung cấp -->
            <div>
                <label for="supplier_id" class="block text-sm font-medium text-gray-700">Nhà cung cấp</label>
                <select name="supplier_id" id="supplier_id" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Chọn nhà cung cấp</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Loại sản phẩm -->
             <div>
                <label for="type_id" class="block text-sm font-medium text-gray-700">Loại sản phẩm</label>
                <select name="type_id" id="type_id" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Chọn loại sản phẩm</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div> 
            <!-- Danh mục sản phẩm -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục sản phẩm</label>
                <select name="category_id" id="category_id" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

           

            <!-- Mô tả sản phẩm -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Mô tả sản phẩm</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
            </div>

            <!-- Hình ảnh sản phẩm -->
            <div class="md:col-span-2">
                <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh sản phẩm</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <!-- Biến thể sản phẩm -->
<div class="md:col-span-2">
    <label class="block text-sm font-medium text-gray-700">Biến thể sản phẩm</label>
    <div class="space-y-4">
        <!-- Kích thước -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Kích thước</label>
            <div class="mt-1 space-y-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="sizes[]" value="S" class="form-checkbox h-5 w-5 text-blue-600 transition duration-150 ease-in-out">
                    <span class="ml-2 text-gray-700">S</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="sizes[]" value="M" class="form-checkbox h-5 w-5 text-blue-600 transition duration-150 ease-in-out">
                    <span class="ml-2 text-gray-700">M</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="sizes[]" value="L" class="form-checkbox h-5 w-5 text-blue-600 transition duration-150 ease-in-out">
                    <span class="ml-2 text-gray-700">L</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="sizes[]" value="XL" class="form-checkbox h-5 w-5 text-blue-600 transition duration-150 ease-in-out">
                    <span class="ml-2 text-gray-700">XL</span>
                </label>
            </div>
        </div>

        <!-- Màu sắc -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Màu sắc</label>
            <div class="mt-1 space-y-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="colors[]" value="red" class="form-checkbox h-5 w-5 text-red-600 transition duration-150 ease-in-out">
                    <span class="ml-2 text-gray-700">Đỏ</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="colors[]" value="blue" class="form-checkbox h-5 w-5 text-blue-600 transition duration-150 ease-in-out">
                    <span class="ml-2 text-gray-700">Xanh</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="colors[]" value="green" class="form-checkbox h-5 w-5 text-green-600 transition duration-150 ease-in-out">
                    <span class="ml-2 text-gray-700">Xanh lá</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="colors[]" value="black" class="form-checkbox h-5 w-5 text-black transition duration-150 ease-in-out">
                    <span class="ml-2 text-gray-700">Đen</span>
                </label>
            </div>
        </div>

        <!-- Hình ảnh biến thể -->
        <div>
            <label for="variant_images" class="block text-sm font-medium text-gray-700">Hình ảnh biến thể</label>
            <input type="file" name="variant_images[]" id="variant_images" multiple
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <p class="mt-1 text-sm text-gray-500">Chọn nhiều hình ảnh nếu cần.</p>
        </div>
    </div>
</div>
            

        </div>

        <!-- Nút submit -->
        <div class="text-start">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Thêm sản phẩm</button>
            <button type="reset" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Hủy bỏ</button>
        </div>
    </form>
</div>
@endsection
