  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{('assets/dist/css/adminlte.min.css')}}">
  <style>
    table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: center;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            font-weight: bold;
        }

/* body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
} */

.circle {
    width: 92px;
    height: 92px;
    background-color: #4CAF50;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.text {
    color: white;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
}
/* button nav */
.bottom-navi {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 70px;
    background: #89a49a;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.3);
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    overflow: visible;
    z-index: 9999;
}

.navi-content {
    position: relative;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.navi-item {
    color: white;
    text-align: center;
    font-size: 22px;
    text-decoration: none;
    transition: 0.3s;
}

.navi-item.active {
    color: yellow; /* Warna item aktif */
}

.navi-center {
    position: absolute;
    top: -30px;
    left: 50%;
    transform: translateX(-50%);
}

.navi-btn {
    background: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #f26c4f;
    font-size: 28px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    text-decoration: none;
    transition: 0.3s;
}

.navi-btn.active-btn {
    background: yellow; /* Jika tombol tengah aktif */
    color: #f26c4f;
}

/* Responsive */
@media (max-width: 500px) {
    .bottom-navi {
        height: 60px;
    }
    .navi-btn {
        width: 50px;
        height: 50px;
        font-size: 24px;
    }
    .navi-item {
        font-size: 20px;
    }
}
#pompa1, #pompa2, #pompa3, #pompa4 {
        display: none;
        margin-top: 10px;
    }

    .pompa-table {
        margin-bottom: 6px !important;
    }

    .pompa-table table {
        margin-bottom: 0 !important;
    }

    .modal-xxl-custom {
    max-width: 95vw;   /* bisa 90–98vw */
}

.is-invalid {
    border-color: #dc3545;
}


.table-head-white th {
    background-color: #ffffff !important;
    color: #000000 !important;
    font-weight: 600;
}
</style>

</style>


