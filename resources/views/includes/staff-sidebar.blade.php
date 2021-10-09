<div class="col-md-4 col-lg-3">
    <div class="card h-min-vh">
        <div class="card-body">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('staff.dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Placement Management</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/staff/groups">Clinical Groups</a>
                        <a class="dropdown-item" href="{{ route('staff.instructors') }}">Instructors</a>
                        <a class="dropdown-item" href="/staff/placement-opportunities">Placement Opportunities</a>
                        <a class="dropdown-item" href="/staff/sites">Sites</a>
                        <a class="dropdown-item" href="{{ route('staff.students') }}">Students</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/staff">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/staff">Account</a>
                </li>
            </ul>
        </div>
    </div>
</div>