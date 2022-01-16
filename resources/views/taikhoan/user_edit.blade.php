@extends("main")
@section("content")
<h1>Cập nhật tafi khoan</h1>
    <form methot="POST"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label for=""> Tên tai khoan:</label>
            <input type="text" name="name" value="{{$user->name}}"><br/>
            <!-- <label for="">Loại sản phẩm:</label>
            <select name="loaisp" id="">
                <option value="">Chọn loại</option>
                @foreach($lstLoai as $loai)
                <option value="{{$loai->id" @if($loai->id==$sanPham->loai_san_pham_id) selected @endif>
                    {{$loai->ten_loai_san_pham}}
                </option>
                @endforeach

            </select><br/> -->
            <label for="">email</label>
            <textarea name="email">{{$user->email}}</textarea><br/>
                <label for="">password</label>
                <input type="password" name="password" value="{{$user->password}}"><br/>
<!--                
                    <label for="">Hinh:</label><br/>
            <img style="width:100px;max-height:100px;object-fit:contain" src="{{$sanPham->hinh}}" alt="">
            <input type="file" accept="image/*" name="hinh"><br/> -->
            <input type="submit">
    </form>

@endsection