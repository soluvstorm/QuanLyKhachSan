<?php
$host= 'localhost';
$user= 'root';
$pw='';
$db='quanlyks';

$conn = @mysqli_connect($host,$user,$pw,$db);
mysqli_set_charset($conn, 'UTF8');
if(mysqli_connect_error()){
  die('Không thể kết nối đến CSDL!');
}


function nhapphong($room_id,$room_type,$note) {
  global $conn;
  $query= "INSERT INTO danhmucphong (room_id, room_type,note) VALUES ('$room_id', '$room_type', N'$note')";
  if(mysqli_query($conn,$query)){
    echo "Đã thêm phòng!";
  }else{
    echo "Không thêm được phòng !!!";
  }
}

function layphieu($id_rent,$room_id,$star_date,$cus_name,$cus_type,$cus_id,$cus_add,$cus_name_2,$cus_type_2,$cus_id_2,$cus_add_2,$cus_name_3,$cus_type_3,$cus_id_3,$cus_add_3) {
    global $conn;
    $query= "INSERT INTO phieuthuephong (id_rent,room_id,star_date,cus_name,cus_type,cus_id,cus_add, cus_name_2,cus_type_2,cus_id_2,cus_add_2, cus_name_3,cus_type_3,cus_id_3,cus_add_3) VALUES ('$id_rent','$room_id','$star_date','$cus_name','$cus_type','$cus_id','$cus_add','$cus_name_2','$cus_type_2','$cus_id_2','$cus_add_2','$cus_name_3','$cus_type_3','$cus_id_3','$cus_add_3')";
    if(mysqli_query($conn,$query)){
      echo "Đã thêm phiếu";
      $sql="UPDATE danhmucphong a INNER JOIN phieuthuephong b ON a.room_id=$room_id SET a.status='Đang sử dụng'";
      if (mysqli_query($conn, $sql)) {
       echo " và cập nhật tình trạng phòng !";
      }
    }else{
      echo "Không thêm được phiếu !!!";
  }
}

function xuatphong() {
 global $conn;
 $query = "SELECT * FROM danhmucphong INNER JOIN phong ON danhmucphong.room_type = phong.room_type";
 $result = mysqli_query($conn, $query);
 while($row = mysqli_fetch_array($result))
 {
   echo "<tr><td>" . $row['room_id'] ."</td>" .
   "<td>" . $row['room_type'] ."</td>" .
   "<td>" . $row['price'] ."</td>" .
   "<td>" . $row['note'] ."</td></tr>";
 }
}

function xuatphong1() {
  global $conn;
  $query = "SELECT * FROM danhmucphong INNER JOIN phong ON danhmucphong.room_type = phong.room_type";
  $result4 = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result4))
  {
    echo "<tr><td>" . $row['room_id'] ."</td>" .
    "<td>" . $row['room_type'] ."</td>" .
    "<td>" . $row['price'] ."</td>" .
    "<td>" . $row['status'] ."</td></tr>";
  }
}

function xuatphieu() {
  global $conn;
  $query = "SELECT * FROM phieuthuephong";
  $result3 = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result3))
  {
    echo "<tr><td>" . $row['id_rent'] ."</td>" .

    "<td>" . $row['star_date'] ."</td>" .
    "<td>" . $row['cus_name'] ."</td>" .
    "<td>" . $row['cus_type'] ."</td>" .
    "<td>" . $row['cus_id'] ."</td>" .
    "<td>" . $row['cus_add'] ."</td></tr>";
  }
}

function laysophong() {
  global $conn;
  $query = "SELECT * FROM danhmucphong WHERE status='Trống' ";
  $result2 = mysqli_query($conn, $query);
  global $options;
  while($row = mysqli_fetch_array($result2))
  {
    $options = $options."<option>$row[0]</option>";
  }
  echo $options;
}

function laysophieu() {
  global $conn;
  $query = "SELECT * FROM phieuthuephong";
  $result6 = mysqli_query($conn, $query);
  global $options2;
  while($row = mysqli_fetch_array($result6))
  {
    $options2 = $options2."<option>$row[0]</option>";
  }
  echo $options2;
}

function laysohoadon() {
  global $conn;
  $query = "SELECT * FROM hoadon";
  $result10 = mysqli_query($conn, $query);
  global $options3;
  while($row = mysqli_fetch_array($result10))
  {
    $options3 = $options3."<option>$row[0]</option>";
  }
  echo $options3;
}

function timphong() {
  global $conn;
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
    if(preg_match("/[0-9]+/", $_POST['query'])){
     global $search;
     $search=$_POST['query'];

     $sql="SELECT d.room_id, p.room_type, d.status, p.price FROM danhmucphong d INNER JOIN phong p ON d.room_type = p.room_type WHERE room_id LIKE '" . $search . "'   ";

     $result5 = mysqli_query($conn, $sql);
     $row=mysqli_fetch_array($result5);

     if ($search == $row['room_id']){
       $room_id=$row['room_id'];
       $room_type=$row['room_type'];
       $price=$row['price'];
       $status=$row['status'];

      echo "<tr><td>" . $row['room_id'] . "</td>" .
      "<td>" . $row['room_type'] . "</td>" .
      "<td>" . $row['price'] . "</td>" .
      "<td>" . $row['status'] . "</td>" .
      "</tr>";
      }
    else {
      echo "<strong>Không tìm thấy phòng!</strong>";
    }
  }
  else {
    echo "<strong>Mời nhập tên phòng!</strong>";
  }
    }
  }
}


function timphieu() {
  global $conn;
  if(isset($_POST['submit2'])){
  if(isset($_GET['go'])){
    if(preg_match("/[0-9]+/", $_POST['id_rent'])){
     $search2=$_POST['id_rent'];
     $sql="SELECT id_rent,room_id,star_date,rent_stat,cus_name,cus_type,cus_id,cus_add, cus_name_2,cus_type_2,cus_id_2,cus_add_2, cus_name_3,cus_type_3,cus_id_3,cus_add_3  FROM phieuthuephong WHERE id_rent LIKE '" . $search2 . "' ";

     $result7 = mysqli_query($conn, $sql);

     while($row=mysqli_fetch_array($result7)){
       $id_rent=$row['id_rent'];
       $room_id=$row['room_id'];
       $star_date=$row['star_date'];
       $rent_stat=$row['rent_stat'];

       $cus_name=$row['cus_name'];
       $cus_type=$row['cus_type'];
       $cus_id=$row['cus_id'];
       $cus_add=$row['cus_add'];

       $cus_name_2=$row['cus_name_2'];
       $cus_type_2=$row['cus_type_2'];
       $cus_id_2=$row['cus_id_2'];
       $cus_add_2=$row['cus_add_2'];

       $cus_name_3=$row['cus_name_3'];
       $cus_type_3=$row['cus_type_3'];
       $cus_id_3=$row['cus_id_3'];
       $cus_add_3=$row['cus_add_3'];
       ?>
       <h1>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</h1>
       <label for="id_rent">Phiếu thuê số: </label>
       <?php
      echo "<td>" . $id_rent . "</td>" ."</tr>";
        ?>
        <br>
        <label for="room_id">Phòng: </label>
        <?php
      echo "<td>" . $room_id . "</td>" ."</tr>";
      ?>
        <br>
        <label for="star_date">Ngày bắt đầu thuê: </label>
      <?php
      echo "<td>" . $star_date . "</td>" ."</tr>";
      ?>
        <br>
        <label for="rent_stat">Tình trạng phiếu: </label>
      <?php
        echo "<td>" . $rent_stat . "</td>" ."</tr>";
      ?>
      <table class="table table-bordered">
      <tr>
        <th>Khách hàng 1</th>
        <td></td>
      </tr>
      <tr>
        <td>Tên khách</td>
      <?php
      echo "<td>" . $cus_name . "</td>" ."</tr>";
      ?>
      <tr>
        <td>Loại khách</td>
      <?php
      echo "<td>" . $cus_type . "</td>" ."</tr>";
      ?>
      <tr>
        <td>CMND/Passport</td>
      <?php
      echo "<td>" . $cus_id . "</td>" ."</tr>";
      ?>
      <tr>
        <td>Địa chỉ</td>
      <?php
      echo "<td>" . $cus_add . "</td>" ."</tr>";
      ?>
      <tr>
        <th>Khách hàng 2</th>
        <td></td>
      </tr>
      <tr>
        <td>Tên khách</td>
      <?php
      echo "<td>" . $cus_name_2 . "</td>" ."</tr>";
      ?>
      <tr>
        <td>Loại khách</td>
      <?php
      echo "<td>" . $cus_type_2 . "</td>" ."</tr>";
      ?>
      <tr>
        <td>CMND/Passport</td>
      <?php
      echo "<td>" . $cus_id_2 . "</td>" ."</tr>";
      ?>
      <tr>
        <td>Địa chỉ</td>
      <?php
      echo "<td>" . $cus_add_2 . "</td>" ."</tr>";
      ?>
      <tr>
        <th>Khách hàng 3</th>
        <td></td>
      </tr>
      <tr>
        <td>Tên khách</td>
      <?php
      echo "<td>" . $cus_name_3 . "</td>" ."</tr>";
      ?>
      <tr>
        <td>Loại khách</td>
      <?php
      echo "<td>" . $cus_type_3 . "</td>" ."</tr>";
      ?>
      <tr>
        <td>CMND/Passport</td>
      <?php
      echo "<td>" . $cus_id_3 . "</td>" ."</tr>";
      ?>
      <tr>
        <td>Địa chỉ</td>
      <?php
      echo "<td>" . $cus_add_3 . "</td>" ."</tr>";
      }
    }

    }
  }
}

function layloaiphong() {
  global $conn;
  $query = "SELECT * FROM phong";
  $result8 = mysqli_query($conn, $query);
  global $options3;
  while($row = mysqli_fetch_array($result8))
  {
    $options3 = $options3."<option>$row[0]</option>";
  }
  echo $options3;
}


function laybill($id_bill,$id_rent,$out_date,$type,$number){
  global $conn;
  $query= "INSERT INTO hoadon (id_bill,id_rent,out_date,type,number) VALUES ('$id_bill','$id_rent','$out_date', '$type','$number')";
  if(mysqli_query($conn,$query)){
    echo "Đã thêm hoá đơn";
    $sql="UPDATE phieuthuephong p
    INNER JOIN hoadon h ON p.id_rent=$id_rent INNER JOIN danhmucphong d ON d.room_id = p.room_id SET p.rent_stat='Đã thanh toán', d.status='Trống' ";
    if (mysqli_query($conn, $sql)) {
     echo " và cập nhật tình trạng Phiếu và Phòng!";
    }
  }else{
    echo "Không thêm được hoá đơn !!!";
  }
}

function timbill () {
  global $conn;
  if(isset($_POST['submit2'])){
  if(isset($_GET['go'])){
    if(preg_match("/[0-9]+/", $_POST['id_bill'])){
     $search3=$_POST['id_bill'];

      $sql = "SELECT h.id_bill, p.cus_name, p.cus_add, p.room_id, r.price,
      datediff(h.out_date,p.star_date)+1 as datecount,
    (datediff(h.out_date,p.star_date)+1)*r.price*h.type*h.number as total
      FROM hoadon as h
      INNER JOIN phieuthuephong as p ON p.id_rent = h.id_rent
      INNER JOIN danhmucphong as d ON p.room_id = d.room_id
      INNER JOIN phong as r ON r.room_type = d.room_type
      WHERE id_bill LIKE '" . $search3 . "' ";

      $result9 = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_array($result9))
      {
        $id_bill=$row['id_bill'];
        $cus_name=$row['cus_name'];
        $cus_add=$row['cus_add'];
        $room_id=$row['room_id'];
        $price=$row['price'];
        $datecount=$row['datecount'];
        $total=$row['total'];

        ?>
        <h1>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</h1>
        <label for="id_bill">Hoá đơn số: </label>
        <?php
        echo "<td>" . $id_bill . "</td>" ."</tr>";
        ?>
        <br>
        <label for="cus_name">Khách hàng: </label>
        <?php
        echo "<td>" . $cus_name . "</td>" ."</tr>";
        ?>
        <br>
        <label for="cus_add">Địa chỉ: </label>
        <?php
        echo "<td>" . $cus_add . "</td>" ."</tr>";
        ?>
        <table class="table table-bordered">
        <thead>
        <tr>
         <th>Phòng</th>
         <th>Số ngày thuê</th>
         <th>Đơn giá</th>
         <th>Thành tiền</th>
        </tr>
        </thead>

        <tbody>
        <?php
        echo "<tr><td>" . $row['room_id'] . "</td>" .
        "<td>" . $row['datecount'] . "</td>" .
        "<td>" . $row['price'] . "</td>" .
        "<td>" . $row['total'] . "</td>" .
        "</tr>";
        ?>
        </tbody>
      </table>
      <?php
     }

    }
    }
  }

}

function timphieu2() {
  global $conn;
  if(isset($_POST['submit3'])){
  if(isset($_GET['go2'])){
    if(preg_match("/[0-9]+/", $_POST['id_rent'])){
     $searched=$_POST['id_rent'];
     $sql="SELECT id_rent,room_id,star_date,rent_stat,cus_name,cus_type,cus_id,cus_add, cus_name_2,cus_type_2,cus_id_2,cus_add_2, cus_name_3,cus_type_3,cus_id_3,cus_add_3  FROM phieuthuephong WHERE id_rent LIKE '" . $searched . "' ";

     $resulted = mysqli_query($conn, $sql);

     while($row=mysqli_fetch_array($resulted)){
       $id_rent=$row['id_rent'];
       $room_id=$row['room_id'];
       $star_date=$row['star_date'];
       $rent_stat=$row['rent_stat'];

       $cus_name=$row['cus_name'];
       $cus_type=$row['cus_type'];
       $cus_id=$row['cus_id'];
       $cus_add=$row['cus_add'];

       $cus_name_2=$row['cus_name_2'];
       $cus_type_2=$row['cus_type_2'];
       $cus_id_2=$row['cus_id_2'];
       $cus_add_2=$row['cus_add_2'];

       $cus_name_3=$row['cus_name_3'];
       $cus_type_3=$row['cus_type_3'];
       $cus_id_3=$row['cus_id_3'];
       $cus_add_3=$row['cus_add_3'];
       ?>
      <table class="table table-bordered">
      <tr>
        <th>Khách hàng 1</th>
        <?php
        echo "<td>" . $cus_type . "</td>" ."</tr>";
        ?>
      <tr>
        <th>Khách hàng 2</th>
        <?php
        echo "<td>" . $cus_type_2 . "</td>" ."</tr>";
        ?>
      <tr>
        <th>Khách hàng 3</th>
        <?php
        echo "<td>" . $cus_type_3 . "</td>" ."</tr>";
        ?>
      </table>
      <?php
      }
    }

    }
  }
}

function login ($user,$password)
{
  global $conn;
  $query = mysqli_query($conn,"SELECT user,password,role FROM users");
    while ($row = mysqli_fetch_array($query))
    {
      if ($user==$row['user'] && $password == $row['password'])
      {
        session_start();
        $_SESSION['user'] = $row['user'];
        $_SESSION['role'] = $row['role'];
        if ($_SESSION['role'] == 1)
        {
          header("location:index.php");
          break;
        }
        else
        {
          header("location:index.php");
          break;
        }
      }
      else
      {
       // echo "<div class='alert alert-danger' role='alert'>
       // <strong>Sai ID hoặc password!</strong> Kiểm tra lại.</div>";
       global $error ;
       $error = 1;
      }
    }

}

?>
