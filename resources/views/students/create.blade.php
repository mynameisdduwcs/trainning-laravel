@extends('layout.layout')

@section('content')

<div class="container">
   <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h4>Thêm xinh viên</h4>
            </div>
            <div class="col-md-6">
               <a href="{{route('students.index')}}" class="btn btn-primary float-end">Danh sách xinh viên</a>
            </div>
         </div>
      </div>
   </div>
   <div class="card-body">
      <form action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-md-4">
               {{-- <div class="form-group">
                  <strong>Tên xinh viên</strong> <br>
                  <input type="text" name='first_name' class="form-control" placeholder="Tên " id="inputName">
                  <input type="text" name='last_name' class="form-control" placeholder="Họ tên đệm" id="inputName">

               </div> --}}
               <div class="form-group">
                  <strong>Tên xinh viên</strong>
                  <div class="row g-3">
                     <div class="col">
                        <input type="text" class="form-control" placeholder="Họ đệm " id="inputName"
                           aria-label="First name" name='first_name'>
                     </div>
                     <div class="col">
                        <input type="text" class="form-control" placeholder="Tên" id="inputName"
                           aria-label="Last name" name='last_name'>
                     </div>
                  </div>
               </div>

               {{csrf_field()}}
               <div class="form-group">
                  <strong> Avatar </strong>
                  <input type="file" name="avatar" class="form-control" id="inputAvatar[]">
               </div>


               <div class="form-group">
                  <strong> Giới tính </strong>
                  <select class="form-select" aria-label="Chọn giới tính" name="gender" id="selectGender">
                     <option value="1">Nam</option>
                     <option value="2">Nữ</option>
                     <option value="3">Lưỡng tính</option>
                  </select>
               </div>

               <div class="form-group">
                  <strong> Ngày sinh </strong>
                  <input type="date" class="form-control" id="inputDOB" name="birthdate" value="">

               </div>
               <div class="form-group">
                  <strong> Dân tộc </strong>
                  <select class="form-select" aria-label="Chọn dân tộc" name="ethnic" id="selectEthnic">
                     <option value="1">Kinh</option>
                     <option value="2">Tày</option>
                     <option value="3">Thái</option>
                     <option value="4">Hoa</option>
                     <option value="5">Khơ-me</option>
                     <option value="6">Mường</option>
                     <option value="7">Nùng</option>
                     <option value="8">HMông</option>
                     <option value="9">Dao</option>
                     <option value="10">Gia-rai</option>
                     <option value="11">Ngái</option>
                     <option value="12">Ê-đê</option>
                     <option value="13">Ba na</option>
                     <option value="14">Xơ-Đăng</option>
                     <option value="15">Sán Chay</option>
                     <option value="16">Cơ-ho</option>
                     <option value="17">Chăm</option>
                     <option value="18">Sán Dìu</option>
                     <option value="19">Hrê</option>
                     <option value="20">Mnông</option>
                     <option value="21">Ra-glai</option>
                     <option value="22">Xtiêng</option>
                     <option value="23">Bru-Vân Kiều</option>
                     <option value="24">Thổ</option>
                     <option value="25">Giáy</option>
                     <option value="26">Cơ-tu</option>
                     <option value="27">Gié Triêng</option>
                     <option value="28">Mạ</option>
                     <option value="29">Khơ-mú</option>
                     <option value="30">Co</option>
                     <option value="31">Tà-ôi</option>
                     <option value="32">Chơ-ro</option>
                     <option value="33">Kháng</option>
                     <option value="34">Xinh-mun</option>
                     <option value="35">Hà Nhì</option>
                     <option value="36">Chu ru</option>
                     <option value="37">Lào</option>
                     <option value="38">La Chí</option>
                     <option value="39">La Ha</option>
                     <option value="40">Phù Lá</option>
                     <option value="41">La Hủ</option>
                     <option value="42">Lự</option>
                     <option value="43">Lô Lô</option>
                     <option value="44">Chứt</option>
                     <option value="45">Mảng</option>
                     <option value="46">Pà Thẻn</option>
                     <option value="47">Co Lao</option>
                     <option value="48">Cống</option>
                     <option value="49">Bố Y</option>
                     <option value="50">Si La</option>
                     <option value="51">Pu Péo</option>
                     <option value="52">Brâu</option>
                     <option value="53">Ơ Đu</option>
                     <option value="54">Rơ măm</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6">


               <div class="form-group">
                  <strong> Quê Quán </strong>
                  <input type="text" name="hometown" class="form-control" placeholder="Nhập quê quán">
               </div>

               <div class="form-group">
                  <strong> Số điện thoại </strong>
                  <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại ">
               </div>

               <div class="form-group">
                  <strong> Email </strong>
                  <input type="text" name="email" class="form-control" placeholder="Nhập email">
               </div>

               <div class="form-group">
                  <strong> Khoa </strong>
                  <select class="form-select" aria-label="Chọn khoa" name="faculty_id" id="selectEthnic">
                     @foreach ($faculties as $item)
                     <option value="{{$item->id}}">{{$item->name}}</option>
                     @endforeach


                  </select>
               </div>

               <div class="form-group">
                  <strong> Ghi chú </strong>
                  <textarea id="inputDescription" class="form-control" name="description"></textarea>
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-success mt-2">Lưu</button>
      </form>
   </div>
</div>
@endsection()