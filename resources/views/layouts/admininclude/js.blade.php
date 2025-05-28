<!-- Custom scripts -->
<script>
    // Toggle the side navigation
    document.getElementById('sidebarToggle').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('main-content').classList.toggle('active');
    });
    
    // Close any open menu accordions when window is resized below 768px
    window.addEventListener('resize', function() {
        if (window.innerWidth < 768) {
            document.getElementById('sidebar').classList.remove('active');
            document.getElementById('main-content').classList.remove('active');
        } else {
            document.getElementById('sidebar').classList.add('active');
            document.getElementById('main-content').classList.add('active');
        }
    });
</script>