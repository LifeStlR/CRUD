<?php  
  if (empty($_GET['alert'])) {
    echo "";
  } elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
  } elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil dihapus.
          </div>";
  }
  ?>

<h2 align="center">Data Table Student</h2>  
        <table border="1" align="center" width="75%">
        <a  href='?page=tambahstudent' class='btn btn-xs btn-info' title='Detail'><i class='fas fa-user-plus'></i></a>
            <tr bgcolor="blue">
                <th>No</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

                <?php

                include "connection.php";
                $no=1;
                $data= mysqli_query($connection, "Select * from student");
                while ($display = mysqli_fetch_Array($data)) {
                    echo "
                    <tr>
                    <td>$no</td>
                    <td>$display[std_id]</td>
                    <td>$display[name]</td>
                    <td>$display[address]</td>

                    <td width='100'>
                        <div>
                          <a href='?page=ubahstudent&id=$display[std_id]' class='btn btn-info btn-sm'><i class='fas far fa-pencil-alt'></i></a>";
                          ?>
                            <a title="Hapus" class="btn btn-danger btn-sm" href="hapusstudent.php?id=<?php echo $display['std_id'];?>" onclick="return confirm('Anda yakin ingin menghapus siswa <?php echo $display['name']; ?>?');">
                              <i class='fas fa-trash-alt'></i>
                            </a>
                          <?php
                      echo "
                          </div>
                        </td>
                      </tr>";

                    $no++;
                }

                ?>
        </table>
    
        <h2 align="center">Data Grade Student</h2>  
        <a  href='?page=tambahgrade' class='btn btn-xs btn-info' title='Detail'><i class='fas fa-user-plus'></i></a>
        <table border="1" align="center" width="75%">
            <tr bgcolor="blue">
                <th>No</th>
                <th>Grade ID</th>
                <th>Student ID</th>
                <th>Subject Code</th>
                <th>MID</th>
                <th>Final</th>
                <th>Action</th>
            </tr>

                <?php
        

                include "connection.php";
                $no=1;
                $data= mysqli_query($connection, "Select * from grade");
                while ($display = mysqli_fetch_Array($data)) {
                    echo "
                    <tr>
                    <td>$no</td>
                    <td>$display[id_grade]</td>
                    <td>$display[std_id]</td>
                    <td>$display[subject_code]</td>
                    <td>$display[mid]</td>
                    <td>$display[final]</td>
                    <td width='100'>
                    <div>
                      <a href='?page=ubahgrade&id=$display[std_id]' class='btn btn-info btn-sm'><i class='fas far fa-pencil-alt'></i></a>";
                      ?>
                        <a title="Hapus" class="btn btn-danger btn-sm" href="hapusgrade.php?id=<?php echo $display['id_grade'];?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                          <i class='fas fa-trash-alt'></i>
                        </a>
                      <?php
                  echo "
                      </div>
                    </td>
                  </tr>";

                $no++;
                }

                ?>
                </table>

        <h2 align="center">Data Subject Student</h2>  
        <a  href='?page=tambahsubject' class='btn btn-xs btn-info' title='Detail'><i class='fas fa-user-plus'></i></a>
        <table border="1" align="center" width="75%">
            <tr bgcolor="blue">
                <th>No</th>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Credit</th>
                <th>Action</th>
            </tr>

                <?php

                include "connection.php";
                $no=1;
                $query= mysqli_query($connection, "Select * from subject");
                while ($data = mysqli_fetch_Array($query)) {
                    echo "
                    <tr>
                    <td>$no</td>
                    <td>$data[subject_code]</td>
                    <td>$data[subject_name]</td>
                    <td>$data[credit]</td>
                    <td width='100'>
                        <div>
                          <a href='?page=ubahsubject&id=$data[subject_code]' class='btn btn-info btn-sm'><i class='fas far fa-pencil-alt'></i></a>";
                          ?>
                            <a title="Hapus" class="btn btn-danger btn-sm" href="hapussubject.php?id=<?php echo $data['subject_code'];?>" onclick="return confirm('Anda yakin ingin menghapus siswa <?php echo $data['subject_name']; ?>?');">
                              <i class='fas fa-trash-alt'></i>
                            </a>
                          <?php
                      echo "
                          </div>
                        </td>
                      </tr>";

                    $no++;
                }

                ?>
        </table>