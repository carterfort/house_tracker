<nav class="navbar navbar-default">
  @if(auth()->check())
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}">{{env('HOUSE_NAME')}}</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
            <a href="#">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lists <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chores <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="disabled"><a href="#">Mark completed</a></li>
            @foreach(App\Chore::all() as $chore)
            <li><a href="#">{{$chore->name}}</a></li>
            @endforeach
            <li class="divider"></li>
            <li><a href="/chores/create">+ New Chore</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bills <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="disabled"><a href="#">Add a Bill From...</a></li>
            @foreach(App\Biller::all() as $biller)
              <li><a href="/billers/{{$biller->id}}/bills/create">{{$biller->name}}</a></li>
            @endforeach
            @if(App\Bill::due()->count())
              <li class="divider"></li>
              <li class="disabled"><a href="#">Upcoming Bills</a></li>
            @foreach(App\Bill::due() as $bill)
              <li><a href="/bills/{{$bill->id}}/payments/create">
                <small class="text-muted">{{$bill->biller->name}}</small><br/>
                Due {{$bill->due_date->format('m/d/Y')}}<br/>
                {{$bill->amount_due}}
              </a></li>
            @endforeach
            @endif
            <li class="divider"></li>
            <li><a href="/billers/create">+ New Biller</a></li>
          </ul>
        </li>
        <!-- 
        
        Delaying these for MVP

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Schedules <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
          </ul>
        </li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/logout">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

  @endif
</nav>