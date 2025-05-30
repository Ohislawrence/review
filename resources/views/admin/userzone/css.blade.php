<style>
    /* Dashboard specific styles */
    .dashboard-container {
        display: flex;
        min-height: calc(100vh - 120px);
    }
    .dashboard-sidebar {
        width: 250px;
        background: #0D1034;
        color: white;
        padding: 20px 0;
        transition: all 0.3s;
    }
    .dashboard-content {
        flex: 1;
        padding: 20px;
        background: #f8f8f8;
    }
    .sidebar-menu {
        list-style: none;
        padding: 0;
    }
    .sidebar-menu li {
        margin-bottom: 5px;
    }
    .sidebar-menu a {
        display: block;
        color: rgba(255, 255, 255, 0.8);
        padding: 12px 20px;
        text-decoration: none;
        transition: all 0.3s;
    }
    .sidebar-menu a:hover,
    .sidebar-menu a.active {
        color: white;
        background: rgba(255, 95, 0, 0.2);
        border-left: 3px solid #FF5F00;
    }
    .sidebar-menu a i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    .mobile-menu-trigger {
        display: none;
        background: #0D1034;
        color: white;
        padding: 15px;
        text-align: center;
        cursor: pointer;
    }
    .mobile-bottom-menu {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #0D1034;
        z-index: 1000;
        padding: 10px 0;
    }
    .mobile-bottom-menu .sidebar-menu {
        display: flex;
        justify-content: space-around;
    }
    .mobile-bottom-menu .sidebar-menu li {
        margin: 0;
        text-align: center;
    }
    .mobile-bottom-menu .sidebar-menu a {
        padding: 8px 5px;
        font-size: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-left: none;
    }
    .mobile-bottom-menu .sidebar-menu a i {
        margin: 0 0 5px 0;
        font-size: 16px;
    }
    .mobile-bottom-menu .sidebar-menu a span {
        display: block;
    }
    @media (max-width: 991.98px) {
        .dashboard-sidebar {
            display: none;
        }
        .mobile-menu-trigger {
            display: block;
        }
        .mobile-bottom-menu {
            display: block;
        }
        .dashboard-content {
            padding-bottom: 70px; /* Space for bottom menu */
        }
    }
    @media (min-width: 992px) {
        .dashboard-sidebar {
            display: block !important;
        }
    }
    /* Dashboard cards */
    .dashboard-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    .dashboard-card h3 {
        margin-top: 0;
        color: #0D1034;
    }
    /* Buttons */
    .main-btn {
        background-color: #0D1034;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        margin-right: 10px;
        cursor: pointer;
    }
    .main-btn.btn-outline {
        background-color: transparent;
        border: 2px solid #0D1034;
        color: #0D1034;
    }
    .logout-btn {
        background: none;
        border: none;
        color: rgba(255, 255, 255, 0.8);
        padding: 12px 20px;
        cursor: pointer;
        width: 100%;
        text-align: left;
    }
    .logout-btn:hover {
        color: white;
        background: rgba(255, 95, 0, 0.2);
        border-left: 3px solid #FF5F00;
    }
    </style>