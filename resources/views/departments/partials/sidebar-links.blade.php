<div class="dc">
    <div class="dc-hdr">Quick Links</div>
    <div class="dc-body">
        <div class="imp-wrap">
            <ul>
                <li><a href="{{ route('department.show',     $dept['slug']) }}"> Department Home</a></li>
                <li><a href="{{ route('department.hod',      $dept['slug']) }}"> HOD's Message</a></li>
                <li><a href="{{ route('department.faculty',  $dept['slug']) }}"> Faculty Members</a></li>
                <li><a href="{{ route('department.goals',    $dept['slug']) }}"> Program Goals</a></li>
                <li><a href="{{ route('department.course',   $dept['slug']) }}"> Course Outline</a></li>
                <li><a href="{{ route('department.labs',     $dept['slug']) }}"> Labs</a></li>
            </ul>
            <ul>
                <li><a href="{{ route('department.semester', $dept['slug']) }}"> Semester Rules</a></li>
                <li><a href="{{ route('department.fee',      $dept['slug']) }}"> Fee Structure</a></li>
                <li><a href="{{ route('department.admissions',$dept['slug']) }}"> Admissions</a></li>
                <li><a href="{{ route('department.datesheets',$dept['slug']) }}"> Date Sheets</a></li>
                <li><a href="{{ route('department.results',  $dept['slug']) }}"> Results</a></li>
                <li><a href="{{ route('department.downloads',$dept['slug']) }}"> Downloads</a></li>
            </ul>
        </div>
    </div>
</div>