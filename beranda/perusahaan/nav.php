<div class="area"></div>
<nav class="main-menu">
    <ul>
        <li>
            <a href="../perusahaan">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                    Home Perusahaan
                </span>
            </a>

        </li>

        <li class="has-subnav">
            <a href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=pt">
                <i class="fa fa-building fa-2x"></i>
                <span class="nav-text">
                    Profil Perusahaan
                </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=rptka">
                <i class="fa fa-handshake-o fa-2x"></i>
                <span class="nav-text">
                    RPTKA
                </span>
            </a>

        </li>
        <li>
            <a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cc-visa fa-2x"></i>
                <span class="nav-text">
                    VISA
                </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=voa">VOA</a>
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=visalain">Visa Lain</a>
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=visa211">Visa 211</a>
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=visa312">Visa 312 ( IMTA )</a>
            </div>
        </li>
        <li>
            <a href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=data_tka">
                <i class="fa fa-user fa-2x"></i>
                <span class="nav-text">
                    DATA TKA
                </span>
            </a>
        </li>
        <li>
            <a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-history fa-2x"></i>
                <span class="nav-text">
                    Riwayat Voucher
                </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=riwayat_voucher_other">Voucher Other</a>
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=riwayat_voucher">Vouvher Visa</a>
            </div>
        </li>

        <li>
            <a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cc-visa fa-2x"></i>
                <span class="nav-text">
                    Riwayat Data Non-Aktif
                </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=data_tka_non">Data TKA</a>
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=visalain_non">Visa Lain</a>
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=voa_non">VOA</a>
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=visa211_non">Visa 211</a>
                <a class="dropdown-item" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=visa312_non">Visa 312 ( IMTA )</a>
            </div>
        </li>


    </ul>

    <ul class="logout">
        <li>
            <a href="../../system/logout.php">
                <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                    Logout
                </span>
            </a>
        </li>
    </ul>
</nav>