<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Logo-->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <img src="/img/acd_logo_1.png" class="logo" width="200" height="60">
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
            @if(Auth::user()->rank == 1)
                <h3 class="text-center text-white text-uppercase fw-bold m-3">admin</h3>
            @else
                <h3 class="text-center text-white text-uppercase fw-bold m-3">{{Auth::user()->account->position}}</h3>
            @endif
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Admin -->
    @if(Auth::user()->rank==1)
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-solid fa-user-secret"></i>
            <span>Admin</span>
        </a>
        <div class="collapse" id="collapseExample1">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Admin:</h6>
                <a class="collapse-item" href="{{route('admin.adviserlist')}}">Adviser Account</a>
                <a class="collapse-item" href="{{route('admin.signatorylist')}}">Signatory Account</a>
                <a class="collapse-item" href="{{route('admin.studentlist')}}">Student Account</a>
                <a class="collapse-item" href="cards.html">###</a>
            </div>
        </div>

    </li>

        <!--transaction-->
        <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-solid fa-user-graduate"></i>
            <span>Transaction</span>
        </a>
        <div class="collapse" id="collapseExample4">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Utilities:</h6>
                <a class="collapse-item" href="{{route('admin.clearance')}}">Create Clearance</a>
            </div>
        </div>

    </li>

    <!-- Clearance Setting -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-solid fa-user-graduate"></i>
            <span>Setting</span>
        </a>
        <div class="collapse" id="collapseExample5">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Utilities:</h6>
                <a class="collapse-item" href="{{route('admin.schoolyear')}}">School Year</a>
                <a class="collapse-item" href="{{route('admin.incharge')}}">Head-in-Charge</a>
                <a class="collapse-item" href="{{route('admin.class')}}">Create Class</a>
            </div>
        </div>

    </li>
    @endif
    <!-- Staff -->
    @if(Auth::user()->rank==2)
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-solid fa-user-tie"></i>
            <span>Staff</span>
        </a>
        <div class="collapse" id="collapseExample2">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Staff:</h6>
                <a class="collapse-item" href="{{route('staff.clearance')}}">Home</a>
                <a class="collapse-item" href="{{route('staff.mystudent')}}">My Student</a>
            </div>
        </div>

    </li>
    @endif

    <!-- Student -->
    @if(Auth::user()->rank=='student')
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
            <i class="fas fa-solid fa-user-graduate"></i>
            <span>Student</span>
        </a>
        <div class="collapse" id="collapseExample3">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Student:</h6>
                <a class="collapse-item" href="buttons.html">View Clearance</a>
                <a class="collapse-item" href="cards.html">###</a>
            </div>
        </div>

    </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>