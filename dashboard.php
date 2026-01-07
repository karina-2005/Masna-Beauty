<?php
session_start();

// Redirect kalau belum login
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

// Anti cache paling keras
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Masna Beauty | Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#ff5fa2" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />
    
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    
    <!-- AdminLTE -->
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    
    <!-- ApexCharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" crossorigin="anonymous" />
    
    <style>
/* ============================================
   MODERN DESIGN SYSTEM - MASNA BEAUTY
============================================ */

:root {
  --pink-primary: #ff5fa2;
  --pink-secondary: #ff8fc7;
  --pink-light: #fff0f6;
  --pink-dark: #ff2f8a;
  --purple: #8b5cf6;
  --text-dark: #2d3748;
  --text-muted: #718096;
  --border-radius: 20px;
  --shadow-sm: 0 4px 15px rgba(255,95,162,.12);
  --shadow-md: 0 10px 30px rgba(255,95,162,.2);
  --shadow-lg: 0 20px 50px rgba(255,95,162,.3);
  --transition: all .4s cubic-bezier(.4,0,.2,1);
}

/* GLOBAL STYLES */
body {
  background: linear-gradient(135deg, #fff0f6 0%, #fff5f8 100%);
  font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
  color: var(--text-dark);
}

/* ============================================
   HEADER - GRADIENT GLASS EFFECT
============================================ */
.app-header {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 50%, #ffa6d5 100%) !important;
  backdrop-filter: blur(10px);
  box-shadow: 0 8px 32px rgba(255,95,162,.25) !important;
  border: none !important;
}

.app-header .nav-link,
.app-header .navbar-brand {
  color: #fff !important;
  font-weight: 600;
  transition: var(--transition);
}

.app-header .nav-link:hover {
  transform: translateY(-2px);
}

.navbar-badge {
  animation: pulse 2s infinite;
  box-shadow: 0 0 20px rgba(255,255,255,.5);
}

@keyframes pulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.15); }
}

/* Brand Logo Enhancement */
.brand-link {
  background: linear-gradient(135deg, rgba(255,255,255,.15) 0%, rgba(255,255,255,.05) 100%);
  backdrop-filter: blur(10px);
  border-radius: 15px;
  margin: 10px;
  padding: 12px 20px !important;
  transition: var(--transition);
}

.brand-link:hover {
  background: rgba(255,255,255,.25);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(255,95,162,.3);
}

.brand-text {
  font-size: 1.3rem !important;
  font-weight: 700 !important;
  background: linear-gradient(135deg, #ff5fa2, #8b5cf6);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* ============================================
   SIDEBAR - MODERN GLASS MORPHISM
============================================ */
.app-sidebar {
  background: rgba(255,240,246,.85) !important;
  backdrop-filter: blur(20px) saturate(180%);
  border-right: 1px solid rgba(255,95,162,.1) !important;
  box-shadow: 4px 0 30px rgba(255,95,162,.08);
}

.app-sidebar .nav-link {
  color: var(--text-dark) !important;
  font-weight: 600;
  border-radius: 16px;
  margin: 8px 12px;
  padding: 14px 20px;
  transition: var(--transition);
  position: relative;
  overflow: hidden;
}

.app-sidebar .nav-link::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  width: 4px;
  height: 100%;
  background: linear-gradient(135deg, var(--pink-primary), var(--purple));
  transform: scaleY(0);
  transition: transform .3s ease;
}

.app-sidebar .nav-link:hover {
  background: rgba(255,95,162,.12);
  transform: translateX(8px);
}

.app-sidebar .nav-link:hover::before {
  transform: scaleY(1);
}

.app-sidebar .nav-link.active {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 100%) !important;
  color: #fff !important;
  box-shadow: 0 10px 30px rgba(255,95,162,.4);
  transform: translateX(8px);
}

.app-sidebar .nav-link.active::before {
  transform: scaleY(1);
  background: #fff;
}

.app-sidebar .nav-link i {
  width: 24px;
  font-size: 1.1rem;
}

/* Sidebar Header Enhancement */
.sidebar-brand {
  background: linear-gradient(135deg, rgba(255,255,255,.5) 0%, rgba(255,255,255,.2) 100%);
  padding: 20px 0;
  margin-bottom: 10px;
}

/* ============================================
   CARDS - ELEVATED WITH GRADIENTS
============================================ */
.card {
  border: none !important;
  border-radius: var(--border-radius) !important;
  box-shadow: var(--shadow-sm) !important;
  transition: var(--transition) !important;
  overflow: hidden;
  background: #fff;
}

.card:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-lg) !important;
}

.card-header {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 100%);
  color: #fff;
  border: none !important;
  padding: 20px 25px;
  font-weight: 700;
  font-size: 1.1rem;
}

/* Stats Cards */
.small-box {
  border-radius: var(--border-radius) !important;
  overflow: hidden;
  position: relative;
  box-shadow: var(--shadow-md) !important;
  transition: var(--transition) !important;
}

.small-box::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(255,255,255,.2) 0%, transparent 70%);
  animation: shimmer 3s infinite;
}

@keyframes shimmer {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.small-box:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 25px 60px rgba(0,0,0,.15) !important;
}

.small-box .inner {
  position: relative;
  z-index: 1;
}

.small-box .icon {
  font-size: 4.5rem !important;
  opacity: .3;
  transition: var(--transition);
}

.small-box:hover .icon {
  opacity: .5;
  transform: rotate(-10deg) scale(1.1);
}

/* Custom Gradients for Stats */
.bg-gradient-pink {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 100%) !important;
}

.bg-gradient-purple {
  background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%) !important;
}

.bg-gradient-success {
  background: linear-gradient(135deg, #10b981 0%, #34d399 100%) !important;
}

.bg-gradient-warning {
  background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%) !important;
}

/* ============================================
   BUTTONS - MODERN ANIMATED
============================================ */
.btn-primary {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 100%) !important;
  border: none !important;
  border-radius: 12px !important;
  padding: 12px 28px !important;
  font-weight: 600 !important;
  box-shadow: 0 8px 20px rgba(255,95,162,.3) !important;
  transition: var(--transition) !important;
  position: relative;
  overflow: hidden;
}

.btn-primary::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  background: rgba(255,255,255,.3);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  transition: width .6s, height .6s;
}

.btn-primary:hover::before {
  width: 300px;
  height: 300px;
}

.btn-primary:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 30px rgba(255,95,162,.5) !important;
}

/* ============================================
   TABLES - ELEGANT DESIGN
============================================ */
.table {
  border-radius: var(--border-radius);
  overflow: hidden;
}

.table thead {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 100%);
  color: #fff;
}

.table thead th {
  border: none;
  padding: 18px;
  font-weight: 700;
  text-transform: uppercase;
  font-size: .85rem;
  letter-spacing: .5px;
}

.table tbody tr {
  transition: var(--transition);
  border-bottom: 1px solid rgba(255,95,162,.08);
}

.table tbody tr:hover {
  background: var(--pink-light);
  transform: scale(1.01);
  box-shadow: 0 4px 15px rgba(255,95,162,.12);
}

.table tbody td {
  padding: 16px;
  vertical-align: middle;
}

/* ============================================
   DROPDOWN MENUS - MODERN GLASS
============================================ */
.dropdown-menu {
  border: none !important;
  border-radius: 16px !important;
  box-shadow: 0 20px 60px rgba(0,0,0,.15) !important;
  padding: 12px !important;
  background: rgba(255,255,255,.95);
  backdrop-filter: blur(10px);
}

.dropdown-item {
  border-radius: 12px !important;
  padding: 12px 16px !important;
  transition: var(--transition) !important;
  margin: 4px 0;
}

.dropdown-item:hover {
  background: var(--pink-light) !important;
  transform: translateX(5px);
  color: var(--pink-primary) !important;
}

/* User Dropdown Header */
.user-header {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 100%) !important;
  padding: 30px !important;
  border-radius: 16px 16px 0 0 !important;
}

/* ============================================
   BADGES - MODERN PILL STYLE
============================================ */
.badge {
  padding: 8px 16px !important;
  border-radius: 20px !important;
  font-weight: 600 !important;
  font-size: .85rem !important;
  letter-spacing: .3px;
}

/* ============================================
   FOOTER - SUBTLE DESIGN
============================================ */
.app-footer {
  background: rgba(255,255,255,.7) !important;
  backdrop-filter: blur(10px);
  border-top: 1px solid rgba(255,95,162,.1) !important;
  padding: 20px !important;
  color: var(--text-muted);
}

/* ============================================
   ANIMATIONS
============================================ */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.app-main,
.card,
.small-box {
  animation: fadeInUp .6s ease-out;
}

.app-main {
  animation-delay: .1s;
}

.card:nth-child(2) {
  animation-delay: .2s;
}

.card:nth-child(3) {
  animation-delay: .3s;
}

/* ============================================
   SCROLLBAR STYLING
============================================ */
::-webkit-scrollbar {
  width: 10px;
  height: 10px;
}

::-webkit-scrollbar-track {
  background: var(--pink-light);
}

::-webkit-scrollbar-thumb {
  background: linear-gradient(135deg, var(--pink-primary), var(--pink-secondary));
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(135deg, var(--pink-dark), var(--pink-primary));
}

/* ============================================
   RESPONSIVE ADJUSTMENTS
============================================ */
@media (max-width: 768px) {
  .small-box {
    margin-bottom: 20px;
  }
  
  .card {
    margin-bottom: 20px;
  }
}

/* ============================================
   LOADING STATES
============================================ */
.loading-spinner {
  width: 40px;
  height: 40px;
  border: 4px solid var(--pink-light);
  border-top: 4px solid var(--pink-primary);
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* ============================================
   CHARTS CONTAINER
============================================ */
.chart-container {
  background: #fff;
  border-radius: var(--border-radius);
  padding: 25px;
  box-shadow: var(--shadow-sm);
  transition: var(--transition);
}

.chart-container:hover {
  box-shadow: var(--shadow-md);
  transform: translateY(-5px);
}
</style>
  </head>

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      
      <!-- HEADER -->
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            
          </ul>

          <ul class="navbar-nav ms-auto">
            <!-- Search -->
           
            </li>

            <!-- Messages -->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-chat-text"></i>
                <span class="navbar-badge badge text-bg-danger">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <a href="#" class="dropdown-item">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="./dist/assets/img/user1-128x128.jpg" alt="User" class="img-size-50 rounded-circle me-3" />
                    </div>
                    <div class="flex-grow-1">
                      <h3 class="dropdown-item-title">
                        Customer A
                        <span class="float-end fs-7 text-danger">
                          <i class="bi bi-star-fill"></i>
                        </span>
                      </h3>
                      <p class="fs-7">Kapan produk ready?</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 2 Hours Ago
                      </p>
                    </div>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Pesan</a>
              </div>
            </li>

            <!-- Notifications -->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <span class="dropdown-item dropdown-header">15 Notifikasi</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-cart-check me-2"></i> 4 pesanan baru
                  <span class="float-end text-secondary fs-7">3 menit</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-people-fill me-2"></i> 8 customer baru
                  <span class="float-end text-secondary fs-7">12 jam</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Notifikasi</a>
              </div>
            </li>

            <!-- Fullscreen -->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
</li>
            <!-- User Menu -->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img src="./dist/assets/img/logo.jpeg" class="user-image rounded-circle shadow" alt="User" />
                <span class="d-none d-md-inline">MASNA BEAUTY</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-header text-bg-primary">
                  <img src="./dist/assets/img/logo.jpeg" class="rounded-circle shadow" alt="User" />
                  <p>
                    Masna Beauty - Toko Kosmetik
                    <small>Since Nov. 2023</small>
                  </p>
                </li>
                <li class="user-footer">
                  
                  <a href="logout.php" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      
      <!-- SIDEBAR -->
      <aside class="app-sidebar bg-body-secondary shadow">
        <div class="sidebar-brand">
          <a href=" " class="brand-link">
            <span class="brand-text fw-light">CosmetiCS</span>
          </a>
        </div>
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <?php include "menu.php"; ?>
          </nav>
        </div>
      </aside>
      
      <!-- MAIN CONTENT -->
      <?php
      $menu = isset($_GET['menu']) ? $_GET['menu'] : '';
      switch ($menu) {
          case 'produk':
              include "form/produk/view.php";
              break;
          case 'addproduk':
              include "form/produk/form.php";
              break;
          case 'editproduk':
              include "form/produk/editproduk.php";
              break;
          case 'customer':
              include "form/customer/view.php";
              break;
          case 'addcust':
              include "form/customer/form.php";
              break;
          case 'editcust':
              include "form/customer/editcust.php";
              break;
          case 'kategori':
              include "form/kategori/view.php";
              break;
          case 'addkategori':
              include "form/kategori/form.php";
              break;
          case 'editkategori':
              include "form/kategori/editkategori.php";
              break;
          case 'supplier':
              include "form/supplier/view.php";
              break;
          case 'addsupplier':
              include "form/supplier/form.php";
              break;
          case 'editsupplier':
              include "form/supplier/editsupplier.php";
              break;
          case 'transaksi':
              include "form/transaksi/view.php";
              break;
          case 'addtransaksi':
              include "form/transaksi/form.php";
              break;
          case 'edittransaksi':
              include "form/transaksi/edittransaksi.php";
              break;
          case 'transaksi_detail':
              include "form/transaksi_detail/view.php";
              break;
          case 'addtransaksi_detail':
              include "form/transaksi_detail/form.php";
              break;
          case 'edittransaksi_detail':
              include "form/transaksi_detail/edittransaksi_detail.php";
              break;
          case 'lap_transaksi':
              include "form/laporan/lap_transaksi.php";
              break;
          case 'lap_customer':
              include "form/laporan/lap_customer.php";
              break;
          case 'lap_produk':
              include "form/laporan/lap_produk.php";
              break;
          default:
              include "main.php";
              break;
      }
      ?>
      
      <!-- FOOTER -->
      <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">
          <i class="bi bi-heart-fill text-danger"></i> Masna Cosmetic
        </div>
        <strong>
          Copyright &copy; 2014-2025&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>
        </strong>
        All rights reserved.
      </footer>
      
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" crossorigin="anonymous"></script>

    <script>
      // OverlayScrollbars Configuration
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };

      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        const isMobile = window.innerWidth <= 992;

        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined && !isMobile) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });

      // ApexCharts - Sales Chart
      const sales_chart_options = {
        series: [{
          name: 'Makeup',
          data: [28, 48, 40, 19, 86, 27, 90],
        }, {
          name: 'Skincare',
          data: [65, 59, 80, 81, 56, 55, 40],
        }],
        chart: {
          height: 180,
          type: 'area',
          toolbar: { show: false },
        },
        legend: { show: false },
        colors: ['#ff5fa2', '#8b5cf6'],
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 3 },
        fill: {
          type: 'gradient',
          gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.2,
          }
        },
        xaxis: {
          type: 'datetime',
          categories: ['2023-01-01', '2023-02-01', '2023-03-01', '2023-04-01', '2023-05-01', '2023-06-01', '2023-07-01'],
        },
        tooltip: {
          x: { format: 'MMMM yyyy' },
        },
      };

      const sales_chart = new ApexCharts(document.querySelector('#sales-chart'), sales_chart_options);
      sales_chart.render();

      // Pie Chart
      const pie_chart_options = {
        series: [700, 500, 400, 300],
        chart: { type: 'donut' },
        labels: ['Makeup', 'Skincare', 'Bodycare', 'Lainnya'],
        colors: ['#ff5fa2', '#8b5cf6', '#10b981', '#f59e0b'],
        legend: {
          position: 'bottom',
          fontSize: '14px',
        },
        plotOptions: {
          pie: {
            donut: {
              size: '70%',
              labels: {
                show: true,
                total: {
                  show: true,
                  label: 'Total',
                  color: '#ff5fa2',
                }
              }
            }
          }
        }
      };

      const pie_chart = new ApexCharts(document.querySelector('#pie-chart'), pie_chart_options);
      pie_chart.render();
    </script>
  </body>
</html>