
<!--############################################# Help Dropdown #####################################################-->

@if(Request::path() == 'help')

    <li class="nav-item dropdown active">

        <a class="nav-link dropdown-toggle" href="#" id="helpdropdown"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-question-circle"></i> Help<b class="caret"></b><span
                    class="sr-only">(current)</span>
        </a>

@else

    <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="helpdropdown"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-question-circle"></i> Help<b class="caret"></b>
        </a>

        @endif

        <div class="dropdown-menu" aria-labelledby="helpdropdown">

            @if(Request::path() == 'help')

                <a class="dropdown-item active" href="#"><i class="far fa-question-circle"></i>
                    Site Help<span class="sr-only">(current)</span></a>

            @else

                <a class="dropdown-item" href="{{ route('page.help') }}"><i class="far fa-question-circle"></i>
                    Site Help</a>

            @endif

        </div>

    </li>

<!--############################################# End of Help Dropdown ##############################################-->