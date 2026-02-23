<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(160deg, #ecfdf5 0%, #eff6ff 100%);
            background-attachment: fixed;
            color: #0f172a;
            min-height: 100vh;
        }

        /* ══ Header ══ */
        .site-header {
            background: linear-gradient(135deg, #059669 0%, #0284c7 100%);
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(5,150,105,.30);
        }
        .site-header .brand {
            font-size: 1.2rem;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
            letter-spacing: -0.3px;
        }
        .site-header .brand em {
            font-style: normal;
            color: #a7f3d0;
        }
        .header-subtitle {
            font-size: 0.85rem;
            color: rgba(255,255,255,.75);
            font-weight: 500;
        }

        /* ══ Content ══ */
        .main-content { padding: 2.5rem 0 4rem; }

        /* ══ Panel ══ */
        .panel {
            background: #fff;
            border: 1px solid #a7f3d0;
            border-radius: 14px;
            box-shadow: 0 4px 24px rgba(5,150,105,.10);
        }
        .panel-head {
            padding: 1.1rem 1.6rem;
            border-bottom: 2px solid #d1fae5;
            background: linear-gradient(90deg, #f0fdf4, #fff);
            border-radius: 14px 14px 0 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .panel-head h5 {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
            color: #065f46;
        }

        /* ══ Buttons ══ */
        .btn-green {
            background: linear-gradient(135deg, #059669, #0284c7);
            color: #fff !important;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            padding: 0.55rem 1.4rem;
            transition: opacity .15s, transform .1s;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 2px 10px rgba(5,150,105,.35);
        }
        .btn-green:hover { opacity: .88; transform: translateY(-1px); }
        .btn-ghost {
            background: #fff;
            color: #475569;
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.55rem 1.2rem;
            text-decoration: none;
            display: inline-block;
            transition: background .15s, border-color .15s, color .15s;
        }
        .btn-ghost:hover { background: #f0fdf4; color: #059669; border-color: #6ee7b7; }
        .btn-red {
            background: #fff;
            color: #dc2626;
            border: 1.5px solid #fca5a5;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.55rem 1.2rem;
            cursor: pointer;
            transition: background .15s, border-color .15s;
        }
        .btn-red:hover { background: #fef2f2; border-color: #f87171; }

        /* ══ Form ══ */
        .form-label {
            font-size: 0.82rem;
            font-weight: 700;
            color: #059669;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            margin-bottom: 0.3rem;
        }
        .form-control, textarea.form-control {
            border: 1.5px solid #a7f3d0;
            border-radius: 8px;
            font-size: 0.97rem;
            padding: 0.6rem 0.9rem;
            color: #0f172a;
            background: #fafffd;
            transition: border .15s, box-shadow .15s;
        }
        .form-control:focus {
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(5,150,105,.15);
            outline: none;
            background: #fff;
        }
        .form-control.is-invalid { border-color: #ef4444; }
        .form-control.is-invalid:focus { box-shadow: 0 0 0 3px rgba(239,68,68,.12); }
        .invalid-feedback { font-size: 0.84rem; color: #ef4444; margin-top: 0.25rem; }

        /* ══ Alert ══ */
        .alert-success {
            background: linear-gradient(90deg, #f0fdf4, #fff);
            color: #065f46;
            border: 1.5px solid #6ee7b7;
            border-radius: 10px;
            font-size: 0.95rem;
            padding: 0.8rem 1.1rem;
        }

        /* ══ Footer ══ */
        .site-footer {
            text-align: center;
            padding: 1.2rem 0;
            font-size: 0.82rem;
            color: #94a3b8;
            border-top: 1px solid #d1fae5;
            margin-top: 2rem;
        }

        /* ══ Page heading ══ */
        .page-title {
            font-size: 1.55rem;
            font-weight: 700;
            letter-spacing: -0.4px;
            color: #065f46;
            margin-bottom: 0;
        }
        .page-subtitle {
            font-size: 0.95rem;
            color: #64748b;
            margin-top: 4px;
            margin-bottom: 0;
        }

        /* ══ Table ══ */
        .data-table { font-size: 0.97rem; }
        .thead-row {
            background: linear-gradient(90deg, #ecfdf5, #eff6ff) !important;
            border-bottom: 2px solid #6ee7b7 !important;
        }
        .th-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            color: #059669;
            font-weight: 700;
        }
        .td-num   { color: #94a3b8; font-size: 0.88rem; }
        .td-name  { color: #065f46; font-weight: 600; font-size: 1rem; }
        .td-age   { color: #0369a1; font-weight: 500; }
        .td-addr  { color: #6d28d9; }
        .td-phone { color: #be185d; font-variant-numeric: tabular-nums; font-weight: 500; }
        .tr-data  { border-bottom: 1px solid #f0fdf4; transition: background .12s; }
        .tr-data:hover { background: #ecfdf5 !important; }

        /* ══ Pagination ══ */
        .pagination-bar  { border-top: 2px solid #d1fae5; }
        .pagination-info { font-size: 0.9rem; color: #64748b; }

        /* ══ Empty state ══ */
        .empty-icon { font-size: 4rem; line-height: 1; color: #6ee7b7; }
        .empty-text { font-size: 0.97rem; color: #64748b; }

        /* ══ Breadcrumb ══ */
        .breadcrumb-bar  { font-size: 0.92rem; color: #64748b; }
        .breadcrumb-link { color: #059669; text-decoration: none; font-weight: 600; }
        .breadcrumb-link:hover { color: #047857; text-decoration: underline; }

        /* ══ Panel body ══ */
        .panel-body { padding: 1.75rem 1.6rem; }

        /* ══ Field hint ══ */
        .field-hint { font-size: 0.82rem; color: #94a3b8; margin-top: 4px; }

        /* ══ Form action bar ══ */
        .form-actions {
            display: flex;
            gap: 0.6rem;
            padding-top: 0.8rem;
            border-top: 1.5px solid #d1fae5;
            margin-top: 0.25rem;
        }

        /* ══ ID Badge ══ */
        .id-badge {
            font-size: 0.8rem;
            color: #0369a1;
            background: #eff6ff;
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid #bae6fd;
            font-weight: 600;
        }

        /* ══ Employee name in breadcrumb ══ */
        .text-dark-strong { color: #0f172a; font-weight: 600; }
    </style>
</head>

<body>

    <header class="site-header">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="brand" href="{{ route('employees.index') }}">
                ⬡ &nbsp;<em>Employee</em>App
            </a>
            <span class="header-subtitle">Manajemen Karyawan</span>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    ✓ &nbsp;{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="site-footer">
        &copy; {{ date('Y') }} EmployeeApp
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
