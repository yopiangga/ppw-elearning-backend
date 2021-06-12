<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Elearning <sup></sup></div>
</a>

<hr class="sidebar-divider my-0">

<li class="nav-item <?=$menuActive=='dashboard' ? 'active': ''?>">
    <a class="nav-link" href="./../dashboard/dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
    Student
</div>

<li class="nav-item <?=$menuActive=='addStudent' ? 'active': ''?>">
    <a class="nav-link" href="./../student/create-student.php">
        <i class="fas fa-plus-square"></i>
        <span>Add Student</span></a>
</li>

<li class="nav-item <?=$menuActive=='readStudent' ? 'active': ''?>">
    <a class="nav-link" href="./../student/read-student.php">
        <i class="fas fa-users"></i>
        <span>Students</span></a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
    Lecturer
</div>

<li class="nav-item <?=$menuActive=='addLecturer' ? 'active': ''?>">
    <a class="nav-link" href="./../lecturer/create-lecturer.php">
        <i class="fas fa-plus-square"></i>
        <span>Add Lecturer</span></a>
</li>

<li class="nav-item <?=$menuActive=='readLecturer' ? 'active': ''?>">
    <a class="nav-link" href="./../lecturer/read-lecturer.php">
        <i class="fas fa-chalkboard-teacher"></i>
        <span>Lecturers</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>