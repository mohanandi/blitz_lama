<?php
include("../system/connect.php");
$jenis = array("VISA 312", "VOA", "VISA 211", "EXTEND VISA 211-1", "EXTEND VISA 211-2", "EXTEND VISA 211-3", "EXTEND VISA 211-4", "VISA LAIN");
$visa_db = array("visa312", "voa", "visa211", "visa211_1", "visa211_2", "visa211_3", "visa211_4", "visa_lain");
$expired_db = array("exp_kitas", "expired", "expired", "expired", "expired", "expired", "expired", "expired");
// $jenis = array("RPTKA", "VOA", "VISA 211", "EXTEND VISA 211-1", "EXTEND VISA 211-2", "EXTEND VISA 211-3", "EXTEND VISA 211-4", "VISA LAIN") ;
// $visa_db = array ("rptka", "voa", "visa211", "visa211_1", "visa211_2", "visa211_3", "visa211_4", "visa_lain") ;
// $expired_db = array ("tgl_habis", "expired", "expired", "expired", "expired", "expired", "expired", "expired") ;
$jumlah = count($jenis);

$hari_ini = array();
$satu_minggu = array();
$dua_minggu = array();
$tiga_minggu  = array();
$satu_bulan = array();
$expired = array();


$today = new DateTime(date('y-m-d'));
$today_hari = $today->format('d');
$today_bulan = $today->format('m');
$today_tahun = $today->format('y');

for ($tanda = 0; $tanda < $jumlah; $tanda++) {

    $hariini_var = 0;
    $satuminggu_var = 0;
    $duaminggu_var = 0;
    $tigaminggu_var = 0;
    $satubulan_var = 0;
    $expired_var = 0;

    $expired_digunakan = $expired_db[$tanda];
    $visa_digunakan = $visa_db[$tanda];
    if ($visa_digunakan == "visa312") {
        $query = "SELECT $expired_digunakan FROM $visa_digunakan";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $obj = new DateTime($row[$expired_digunakan]);
            $obj_tahun = $obj->format('y');
            $obj_bulan = $obj->format('m');
            $obj_hari = $obj->format('d');

            $selisih = $today->diff($obj);
            $selisih_tahun = $selisih->format('%y');
            $selisih_bulan = $selisih->format('%m');
            $selisih_hari = $selisih->format('%d');


            if ($today_tahun > $obj_tahun) {
                $expired_var++;
            } else if ($today_tahun == $obj_tahun) {
                if ($today_bulan > $obj_bulan) {
                    $expired_var++;
                } else if ($today_bulan == $obj_bulan) {
                    if ($today_hari > $obj_hari) {
                        $expired_var++;
                    } else if ($selisih_hari == 0) {
                        $hariini_var++;
                    } else if (($selisih_bulan == 0) && ($selisih_tahun == 0)) {
                        if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                            $satuminggu_var++;
                        } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                            $duaminggu_var++;
                        } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                            $tigaminggu_var++;
                        }
                    }
                } else if ($today_bulan < $obj_bulan) {
                    if ($selisih_bulan == 1) {
                        $satubulan_var++;
                    } else if ($selisih_bulan == 0) {
                        if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                            $satuminggu_var++;
                        } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                            $duaminggu_var++;
                        } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                            $tigaminggu_var++;
                        }
                    }
                }
            } else {
            }
        }
    } else if ($visa_digunakan == "voa") {
        $query = "SELECT $expired_digunakan FROM $visa_digunakan";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $obj = new DateTime($row[$expired_digunakan]);
            $obj_tahun = $obj->format('y');
            $obj_bulan = $obj->format('m');
            $obj_hari = $obj->format('d');

            $selisih = $today->diff($obj);
            $selisih_tahun = $selisih->format('%y');
            $selisih_bulan = $selisih->format('%m');
            $selisih_hari = $selisih->format('%d');


            if ($today_tahun > $obj_tahun) {
                $expired_var++;
            } else if ($today_tahun == $obj_tahun) {
                if ($today_bulan > $obj_bulan) {
                    $expired_var++;
                } else if ($today_bulan == $obj_bulan) {
                    if ($today_hari > $obj_hari) {
                        $expired_var++;
                    } else if ($selisih_hari == 0) {
                        $hariini_var++;
                    } else if (($selisih_bulan == 0) && ($selisih_tahun == 0)) {
                        if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                            $satuminggu_var++;
                        } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                            $duaminggu_var++;
                        } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                            $tigaminggu_var++;
                        }
                    }
                } else if ($today_bulan < $obj_bulan) {
                    if ($selisih_bulan == 1) {
                        $satubulan_var++;
                    } else if ($selisih_bulan == 0) {
                        if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                            $satuminggu_var++;
                        } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                            $duaminggu_var++;
                        } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                            $tigaminggu_var++;
                        }
                    }
                }
            } else {
            }
        }
    } else if ($visa_digunakan == "visa211") {
        $query = "SELECT $expired_digunakan, passport FROM $visa_digunakan";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $passport = $row['passport'];
            $visa_lanjut = "SELECT * FROM visa211_1 WHERE passport = '$passport'";
            $query_lanjut = mysqli_query($connection, $visa_lanjut);
            if (mysqli_num_rows($query_lanjut) == 0) {
                $obj = new DateTime($row[$expired_digunakan]);
                $obj_tahun = $obj->format('y');
                $obj_bulan = $obj->format('m');
                $obj_hari = $obj->format('d');

                $selisih = $today->diff($obj);
                $selisih_tahun = $selisih->format('%y');
                $selisih_bulan = $selisih->format('%m');
                $selisih_hari = $selisih->format('%d');


                if ($today_tahun > $obj_tahun) {
                    $expired_var++;
                } else if ($today_tahun == $obj_tahun) {
                    if ($today_bulan > $obj_bulan) {
                        $expired_var++;
                    } else if ($today_bulan == $obj_bulan) {
                        if ($today_hari > $obj_hari) {
                            $expired_var++;
                        } else if ($selisih_hari == 0) {
                            $hariini_var++;
                        } else if (($selisih_bulan == 0) && ($selisih_tahun == 0)) {
                            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                                $satuminggu_var++;
                            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                                $duaminggu_var++;
                            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                                $tigaminggu_var++;
                            }
                        }
                    } else if ($today_bulan < $obj_bulan) {
                        if ($selisih_bulan == 1) {
                            $satubulan_var++;
                        } else if ($selisih_bulan == 0) {
                            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                                $satuminggu_var++;
                            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                                $duaminggu_var++;
                            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                                $tigaminggu_var++;
                            }
                        }
                    }
                } else {
                }
            } else {
            }
        }
    } else if ($visa_digunakan == "visa211_1") {

        $query = "SELECT $expired_digunakan, passport FROM $visa_digunakan";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $passport = $row['passport'];
            $visa_lanjut = "SELECT * FROM visa211_2 WHERE passport = '$passport'";
            $query_lanjut = mysqli_query($connection, $visa_lanjut);
            if (mysqli_num_rows($query_lanjut) == 0) {
                $obj = new DateTime($row[$expired_digunakan]);
                $obj_tahun = $obj->format('y');
                $obj_bulan = $obj->format('m');
                $obj_hari = $obj->format('d');

                $selisih = $today->diff($obj);
                $selisih_tahun = $selisih->format('%y');
                $selisih_bulan = $selisih->format('%m');
                $selisih_hari = $selisih->format('%d');


                if ($today_tahun > $obj_tahun) {
                    $expired_var++;
                } else if ($today_tahun == $obj_tahun) {
                    if ($today_bulan > $obj_bulan) {
                        $expired_var++;
                    } else if ($today_bulan == $obj_bulan) {
                        if ($today_hari > $obj_hari) {
                            $expired_var++;
                        } else if ($selisih_hari == 0) {
                            $hariini_var++;
                        } else if (($selisih_bulan == 0) && ($selisih_tahun == 0)) {
                            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                                $satuminggu_var++;
                            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                                $duaminggu_var++;
                            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                                $tigaminggu_var++;
                            }
                        }
                    } else if ($today_bulan < $obj_bulan) {
                        if ($selisih_bulan == 1) {
                            $satubulan_var++;
                        } else if ($selisih_bulan == 0) {
                            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                                $satuminggu_var++;
                            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                                $duaminggu_var++;
                            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                                $tigaminggu_var++;
                            }
                        }
                    }
                } else {
                }
            } else {
            }
        }
    } else if ($visa_digunakan == "visa211_2") {
        $query = "SELECT $expired_digunakan, passport FROM $visa_digunakan";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $passport = $row['passport'];
            $visa_lanjut = "SELECT * FROM visa211_3 WHERE passport = '$passport'";
            $query_lanjut = mysqli_query($connection, $visa_lanjut);
            if (mysqli_num_rows($query_lanjut) == 0) {
                $obj = new DateTime($row[$expired_digunakan]);
                $obj_tahun = $obj->format('y');
                $obj_bulan = $obj->format('m');
                $obj_hari = $obj->format('d');

                $selisih = $today->diff($obj);
                $selisih_tahun = $selisih->format('%y');
                $selisih_bulan = $selisih->format('%m');
                $selisih_hari = $selisih->format('%d');


                if ($today_tahun > $obj_tahun) {
                    $expired_var++;
                } else if ($today_tahun == $obj_tahun) {
                    if ($today_bulan > $obj_bulan) {
                        $expired_var++;
                    } else if ($today_bulan == $obj_bulan) {
                        if ($today_hari > $obj_hari) {
                            $expired_var++;
                        } else if ($selisih_hari == 0) {
                            $hariini_var++;
                        } else if (($selisih_bulan == 0) && ($selisih_tahun == 0)) {
                            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                                $satuminggu_var++;
                            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                                $duaminggu_var++;
                            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                                $tigaminggu_var++;
                            }
                        }
                    } else if ($today_bulan < $obj_bulan) {
                        if ($selisih_bulan == 1) {
                            $satubulan_var++;
                        } else if ($selisih_bulan == 0) {
                            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                                $satuminggu_var++;
                            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                                $duaminggu_var++;
                            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                                $tigaminggu_var++;
                            }
                        }
                    }
                } else {
                }
            } else {
            }
        }
    } else if ($visa_digunakan == "visa211_3") {
        $query = "SELECT $expired_digunakan, passport FROM $visa_digunakan";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $passport = $row['passport'];
            $visa_lanjut = "SELECT * FROM visa211_4 WHERE passport = '$passport'";
            $query_lanjut = mysqli_query($connection, $visa_lanjut);
            if (mysqli_num_rows($query_lanjut) == 0) {
                $obj = new DateTime($row[$expired_digunakan]);
                $obj_tahun = $obj->format('y');
                $obj_bulan = $obj->format('m');
                $obj_hari = $obj->format('d');

                $selisih = $today->diff($obj);
                $selisih_tahun = $selisih->format('%y');
                $selisih_bulan = $selisih->format('%m');
                $selisih_hari = $selisih->format('%d');


                if ($today_tahun > $obj_tahun) {
                    $expired_var++;
                } else if ($today_tahun == $obj_tahun) {
                    if ($today_bulan > $obj_bulan) {
                        $expired_var++;
                    } else if ($today_bulan == $obj_bulan) {
                        if ($today_hari > $obj_hari) {
                            $expired_var++;
                        } else if ($selisih_hari == 0) {
                            $hariini_var++;
                        } else if (($selisih_bulan == 0) && ($selisih_tahun == 0)) {
                            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                                $satuminggu_var++;
                            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                                $duaminggu_var++;
                            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                                $tigaminggu_var++;
                            }
                        }
                    } else if ($today_bulan < $obj_bulan) {
                        if ($selisih_bulan == 1) {
                            $satubulan_var++;
                        } else if ($selisih_bulan == 0) {
                            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                                $satuminggu_var++;
                            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                                $duaminggu_var++;
                            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                                $tigaminggu_var++;
                            }
                        }
                    }
                } else {
                }
            } else {
            }
        }
    } else if ($visa_digunakan == "visa211_4") {
        $query = "SELECT $expired_digunakan FROM $visa_digunakan";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $obj = new DateTime($row[$expired_digunakan]);
            $obj_tahun = $obj->format('y');
            $obj_bulan = $obj->format('m');
            $obj_hari = $obj->format('d');

            $selisih = $today->diff($obj);
            $selisih_tahun = $selisih->format('%y');
            $selisih_bulan = $selisih->format('%m');
            $selisih_hari = $selisih->format('%d');


            if ($today_tahun > $obj_tahun) {
                $expired_var++;
            } else if ($today_tahun == $obj_tahun) {
                if ($today_bulan > $obj_bulan) {
                    $expired_var++;
                } else if ($today_bulan == $obj_bulan) {
                    if ($today_hari > $obj_hari) {
                        $expired_var++;
                    } else if ($selisih_hari == 0) {
                        $hariini_var++;
                    } else if (($selisih_bulan == 0) && ($selisih_tahun == 0)) {
                        if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                            $satuminggu_var++;
                        } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                            $duaminggu_var++;
                        } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                            $tigaminggu_var++;
                        }
                    }
                } else if ($today_bulan < $obj_bulan) {
                    if ($selisih_bulan == 1) {
                        $satubulan_var++;
                    } else if ($selisih_bulan == 0) {
                        if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                            $satuminggu_var++;
                        } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                            $duaminggu_var++;
                        } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                            $tigaminggu_var++;
                        }
                    }
                }
            } else {
            }
        }
    } else if ($visa_digunakan == "visa_lain") {
        $query = "SELECT $expired_digunakan FROM $visa_digunakan";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $obj = new DateTime($row[$expired_digunakan]);
            $obj_tahun = $obj->format('y');
            $obj_bulan = $obj->format('m');
            $obj_hari = $obj->format('d');

            $selisih = $today->diff($obj);
            $selisih_tahun = $selisih->format('%y');
            $selisih_bulan = $selisih->format('%m');
            $selisih_hari = $selisih->format('%d');


            if ($today_tahun > $obj_tahun) {
                $expired_var++;
            } else if ($today_tahun == $obj_tahun) {
                if ($today_bulan > $obj_bulan) {
                    $expired_var++;
                } else if ($today_bulan == $obj_bulan) {
                    if ($today_hari > $obj_hari) {
                        $expired_var++;
                    } else if ($selisih_hari == 0) {
                        $hariini_var++;
                    } else if (($selisih_bulan == 0) && ($selisih_tahun == 0)) {
                        if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                            $satuminggu_var++;
                        } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                            $duaminggu_var++;
                        } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                            $tigaminggu_var++;
                        }
                    }
                } else if ($today_bulan < $obj_bulan) {
                    if ($selisih_bulan == 1) {
                        $satubulan_var++;
                    } else if ($selisih_bulan == 0) {
                        if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
                            $satuminggu_var++;
                        } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
                            $duaminggu_var++;
                        } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
                            $tigaminggu_var++;
                        }
                    }
                }
            } else {
            }
        }
    }
    array_push($hari_ini, $hariini_var);
    array_push($satu_minggu, $satuminggu_var);
    array_push($dua_minggu, $duaminggu_var);
    array_push($tiga_minggu, $tigaminggu_var);
    array_push($satu_bulan, $satubulan_var);
    array_push($expired, $expired_var);
}

?>
<html>


<table>

    <thead>
        <tr>
            <th style="color:black;"> JENIS </th>
            <th style="color:black;"> <strong> HARI INI </strong></th>
            <th style="color:black;"> <strong> SATU MINGGU </strong></th>
            <th style="color:black;"> <strong> DUA MINGGU </strong></th>
            <th style="color:black;"> <strong> TIGA MINGGU </strong></th>
            <th style="color:black;"> <strong> SATU BULAN </strong></th>
            <th style="color:black;"> <strong> EXPIRED </strong></th>
            <th style="color:black;"> <strong> DETAIL </strong></th>
        </tr>
    </thead>

    <tbody>
        <?php
        for ($i = 0; $i < $jumlah; $i++) {
        ?>
            <tr>
                <td><?php echo $jenis[$i]; ?></td>
                <td><?php echo $hari_ini[$i]; ?></td>
                <td><?php echo $satu_minggu[$i]; ?></td>
                <td><?php echo $dua_minggu[$i]; ?></td>
                <td><?php echo $tiga_minggu[$i]; ?></td>
                <td><?php echo $satu_bulan[$i]; ?></td>
                <td><?php echo $expired[$i]; ?></td>
                <td><a href="report?page=<?php echo $visa_db[$i]; ?>">View Detail</a></td>
            </tr>
        <?php } ?>
    </tbody>

</table>

</html>