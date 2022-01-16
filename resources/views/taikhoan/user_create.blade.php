@extends('main')
@section('content')
<h1>Them sản phẩm</h1>
<form action="{{route('sanPham.store'}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <label for=""> Teen san pham:</label>
            <input type="text" name="tensp" value=""><br/>
            <label for="">Loai san pham:</label>
            <select name="loaisp" id="">
                <option value="">Chọn loại</option>
                @foreach($lstLoai as $loai)
                <option value="{{$loai->id" >
                    {{$loai->ten_loai_san_pham}}
                </option>
                @endforeach

            </select><br/>
            <label for="">Mô tả:</label>
            <textarea name="mota"></textarea><br/>
                <label for="">So luong:</label>
                <input type="text" name="soluong" ><br/>
                <label for="">Gia</label>
                <input type="text" name="gia" ><br/>
                    <label for="">Hinh:</label><br/>
            
            <input type="file" accept="image/*" name="hinh"><br/>
            <input type="submit">
</form>
@endsection