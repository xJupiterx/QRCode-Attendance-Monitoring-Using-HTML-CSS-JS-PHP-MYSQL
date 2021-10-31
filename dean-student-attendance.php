<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/calendar.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <center>
					<div class="sidebar-header" style="background-color: #3acf61">
						<img src="assets/images/scs.png">
						<br>
						<a style="color:white;font-size:22px;">School of Computer Studies</a>
					</div>	
				</center>
                <div class="sidebar-menu">
					<ul class="menu">
                        <div class="divider">
                            <div class="divider-text" style="color: gray; font-size: 12px">Main Menu</div>
                        </div>
                        <li class="sidebar-item active ">
                            <a href="dean-page.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="dean-student-info.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="home" width="20"></i>
                                <span>View Student's Information</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="book" width="20"></i>
                                <span>Attendance Monitoring</span>
                            </a>
                            <ul class="submenu " style="background-color: #e3e3e3">
                                <li>
                                    <a href="dean-student-attendance.php">Start A Class</a>
                                </li>
                                <li>
                                    <a href="#">View Student's Attendance</a>
                                </li>
                            </ul>
                        </li>
						<div class="divider">
                            <div class="divider-text" style="color: gray; font-size: 12px">More Options</div>
                        </div>
						<li class="sidebar-item active ">
                            <a href="dean-createacc.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="plus" width="20"></i>
                                <span>Create Faculty Account</span>
                            </a>
                        </li>
						<li class="sidebar-item active ">
                            <a href="dean-update-database.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="database" width="20"></i>
                                <span>Update Student Database</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/<?php echo $_SESSION['lastname']; ?>.jpg" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?>!</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
				<section class="section">
                    <div class="row mb-4">
                        <div class="col-md-6">
							<div class = "card h-100">
								<div class="card-header" style="background-color: #3acf61">
									<a style="color: white" href="dean-qrscanner.php" method="subjects"><center><strong>Click <u>here</u> to Open QR Scanner.</strong></center></a>
								</div>
								<div id="calendar"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card h-100">
                                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #3acf61">
                                    <h4 class="card-title" style="color: white"><strong>Recent Class</strong></h4>
                                    <div class="d-flex ">
                                        <i data-feather="download"  style="color: white"></i>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0">
									<div class="table-responsive">
										<?php
											$sqlSelect = "SELECT * FROM recent_schedule ORDER BY schedule_id DESC";
											$result = mysqli_query($db, $sqlSelect);
														
											if (mysqli_num_rows($result) > 0) {
										?>
										<div class="form-group position-relative has-icon-left">
											<div class="position-relative">
												<input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for Student ID..">
												<div class="form-control-icon">
													<i data-feather="search"></i>
												</div>
											</div>
										</div>
										<form method='post' style='overflow:scroll; width:100%; height:530px'>
											<table id="myTable" class="table table-bordered table-sm" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th style = "width:8%; font-size: 14px">Subject</th>
														<th style = "width:8%; font-size: 14px">Section</th>
														<th style = "width:8%; font-size: 14px">Time-In</th>
														<th style = "width:8%; font-size: 14px">Time-Out</th>
														<th style = "width:8%; font-size: 14px">Date of Schedule</th>
														<th style = "width:8%; font-size: 14px">Status</th>

													</tr>
												</thead>
												<?php
												while ($row = mysqli_fetch_array($result)) {
												?>
												<tbody>
													<tr>
														<td><?php  echo $row['subject']; ?></td>
														<td><?php  echo $row['section']; ?></td>
														<td><?php  echo $row['timein']; ?></td>
														<td><?php  echo $row['timeout']; ?></td>
														<td><?php  echo $row['date_of_schedule']; ?></td>
														<td><?php  echo $row['sched_status']; ?></td>
													</tr>
												<?php } ?>
												</tbody>
											</table>
										</form>
										<?php } ?>
										<?php if (mysqli_num_rows($result) <= 0) {?>
                                        <div class="form-group position-relative has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for Student ID..">
                                                <div class="form-control-icon">
                                                    <i data-feather="search"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="col-md-auto" method='post' style='overflow:scroll; width:100%; height: 400px'>
                                            <table id="myTable" class="table table-bordered table-sm" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th style = "width:8%; font-size: 14px">Student_ID</th>
                                                        <th style = "width:8%; font-size: 14px">First name</th>
                                                        <th style = "width:8%; font-size: 14px">Last name</th>
                                                        <th style = "width:8%; font-size: 14px">Subject</th>
                                                        <th style = "width:8%; font-size: 14px">Section</th>
                                                        <th style = "width:8%; font-size: 14px">Remarks</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </form>
                                        <?php } ?>
									</div>
								</div>
                            </div>
						</div>
					</div>
				</section>
				<br>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
	<script src="assets/js/moment.min.js"></script>
    <script src="assets/js/main.js"></script>
	<script>
		!function() {
		  var today = moment();
		  function Calendar(selector, events) {
			this.el = document.querySelector(selector);
			this.events = events;
			this.current = moment().date(1);
			this.draw();
			var current = document.querySelector('.today');
		  }
		  Calendar.prototype.draw = function() {
			this.drawHeader();
			this.drawMonth();
			this.drawLegend();
		  }

		  Calendar.prototype.drawHeader = function() {
			var self = this;
			if(!this.header) {
			  //Create the header elements
			  this.header = createElement('div', 'header');
			  this.header.className = 'header';

			  this.title = createElement('h1');

			  var right = createElement('div', 'right');
			  right.addEventListener('click', function() { self.nextMonth(); });

			  var left = createElement('div', 'left');
			  left.addEventListener('click', function() { self.prevMonth(); });

			  //Append the Elements
			  this.header.appendChild(this.title); 
			  this.header.appendChild(right);
			  this.header.appendChild(left);
			  this.el.appendChild(this.header);
			}

			this.title.innerHTML = this.current.format('MMMM YYYY');
		  }

		  Calendar.prototype.drawMonth = function() {
			var self = this;
			
			this.events.forEach(function(ev) {
			 ev.date = self.current.clone().date(Math.random() * (29 - 1) + 1);
			});
			
			
			if(this.month) {
			  this.oldMonth = this.month;
			  this.oldMonth.className = 'month out ' + (self.next ? 'next' : 'prev');
			  this.oldMonth.addEventListener('webkitAnimationEnd', function() {
				self.oldMonth.parentNode.removeChild(self.oldMonth);
				self.month = createElement('div', 'month');
				self.backFill();
				self.currentMonth();
				self.fowardFill();
				self.el.appendChild(self.month);
				window.setTimeout(function() {
				  self.month.className = 'month in ' + (self.next ? 'next' : 'prev');
				}, 16);
			  });
			} else {
				this.month = createElement('div', 'month');
				this.el.appendChild(this.month);
				this.backFill();
				this.currentMonth();
				this.fowardFill();
				this.month.className = 'month new';
			}
		  }

		  Calendar.prototype.backFill = function() {
			var clone = this.current.clone();
			var dayOfWeek = clone.day();

			if(!dayOfWeek) { return; }

			clone.subtract('days', dayOfWeek+1);

			for(var i = dayOfWeek; i > 0 ; i--) {
			  this.drawDay(clone.add('days', 1));
			}
		  }

		  Calendar.prototype.fowardFill = function() {
			var clone = this.current.clone().add('months', 1).subtract('days', 1);
			var dayOfWeek = clone.day();

			if(dayOfWeek === 6) { return; }

			for(var i = dayOfWeek; i < 6 ; i++) {
			  this.drawDay(clone.add('days', 1));
			}
		  }

		  Calendar.prototype.currentMonth = function() {
			var clone = this.current.clone();

			while(clone.month() === this.current.month()) {
			  this.drawDay(clone);
			  clone.add('days', 1);
			}
		  }

		  Calendar.prototype.getWeek = function(day) {
			if(!this.week || day.day() === 0) {
			  this.week = createElement('div', 'week');
			  this.month.appendChild(this.week);
			}
		  }

		  Calendar.prototype.drawDay = function(day) {
			var self = this;
			this.getWeek(day);

			//Outer Day
			var outer = createElement('div', this.getDayClass(day));
			outer.addEventListener('click', function() {
			  self.openDay(this);
			});

			//Day Name
			var name = createElement('div', 'day-name', day.format('ddd'));

			//Day Number
			var number = createElement('div', 'day-number', day.format('DD'));


			//Events
			var events = createElement('div', 'day-events');
			this.drawEvents(day, events);

			outer.appendChild(name);
			outer.appendChild(number);
			outer.appendChild(events);
			this.week.appendChild(outer);
		  }

		  Calendar.prototype.drawEvents = function(day, element) {
			if(day.month() === this.current.month()) {
			  var todaysEvents = this.events.reduce(function(memo, ev) {
				if(ev.date.isSame(day, 'day')) {
				  memo.push(ev);
				}
				return memo;
			  }, []);

			  todaysEvents.forEach(function(ev) {
				var evSpan = createElement('span', ev.color);
				element.appendChild(evSpan);
			  });
			}
		  }

		  Calendar.prototype.getDayClass = function(day) {
			classes = ['day'];
			if(day.month() !== this.current.month()) {
			  classes.push('other');
			} else if (today.isSame(day, 'day')) {
			  classes.push('today');
			}
			return classes.join(' ');
		  }

		  Calendar.prototype.openDay = function(el) {
			var details, arrow;
			var dayNumber = +el.querySelectorAll('.day-number')[0].innerText || +el.querySelectorAll('.day-number')[0].textContent;
			var day = this.current.clone().date(dayNumber);

			var currentOpened = document.querySelector('.details');

			//Check to see if there is an open detais box on the current row
			if(currentOpened && currentOpened.parentNode === el.parentNode) {
			  details = currentOpened;
			  arrow = document.querySelector('.arrow');
			} else {
			  //Close the open events on differnt week row
			  //currentOpened && currentOpened.parentNode.removeChild(currentOpened);
			  if(currentOpened) {
				currentOpened.addEventListener('webkitAnimationEnd', function() {
				  currentOpened.parentNode.removeChild(currentOpened);
				});
				currentOpened.addEventListener('oanimationend', function() {
				  currentOpened.parentNode.removeChild(currentOpened);
				});
				currentOpened.addEventListener('msAnimationEnd', function() {
				  currentOpened.parentNode.removeChild(currentOpened);
				});
				currentOpened.addEventListener('animationend', function() {
				  currentOpened.parentNode.removeChild(currentOpened);
				});
				currentOpened.className = 'details out';
			  }

			  //Create the Details Container
			  details = createElement('div', 'details in');

			  //Create the arrow
			  var arrow = createElement('div', 'arrow');

			  //Create the event wrapper

			  details.appendChild(arrow);
			  el.parentNode.appendChild(details);
			}

			var todaysEvents = this.events.reduce(function(memo, ev) {
			  if(ev.date.isSame(day, 'day')) {
				memo.push(ev);
			  }
			  return memo;
			}, []);

			this.renderEvents(todaysEvents, details);

			arrow.style.left = el.offsetLeft - el.parentNode.offsetLeft + 27 + 'px';
		  }

		  Calendar.prototype.renderEvents = function(events, ele) {
			//Remove any events in the current details element
			var currentWrapper = ele.querySelector('.events');
			var wrapper = createElement('div', 'events in' + (currentWrapper ? ' new' : ''));

			events.forEach(function(ev) {
			  var div = createElement('div', 'event');
			  var square = createElement('div', 'event-category ' + ev.color);
			  var span = createElement('span', '', ev.eventName);

			  div.appendChild(square);
			  div.appendChild(span);
			  wrapper.appendChild(div);
			});

			if(!events.length) {
			  var div = createElement('div', 'event empty');
			  var span = createElement('span', '', 'No Events');

			  div.appendChild(span);
			  wrapper.appendChild(div);
			}

			if(currentWrapper) {
			  currentWrapper.className = 'events out';
			  currentWrapper.addEventListener('webkitAnimationEnd', function() {
				currentWrapper.parentNode.removeChild(currentWrapper);
				ele.appendChild(wrapper);
			  });
			  currentWrapper.addEventListener('oanimationend', function() {
				currentWrapper.parentNode.removeChild(currentWrapper);
				ele.appendChild(wrapper);
			  });
			  currentWrapper.addEventListener('msAnimationEnd', function() {
				currentWrapper.parentNode.removeChild(currentWrapper);
				ele.appendChild(wrapper);
			  });
			  currentWrapper.addEventListener('animationend', function() {
				currentWrapper.parentNode.removeChild(currentWrapper);
				ele.appendChild(wrapper);
			  });
			} else {
			  ele.appendChild(wrapper);
			}
		  }

		  Calendar.prototype.drawLegend = function() {
			var legend = createElement('div', 'legend');
			var calendars = this.events.map(function(e) {
			  return e.calendar + '|' + e.color;
			}).reduce(function(memo, e) {
			  if(memo.indexOf(e) === -1) {
				memo.push(e);
			  }
			  return memo;
			}, []).forEach(function(e) {
			  var parts = e.split('|');
			  var entry = createElement('span', 'entry ' +  parts[1], parts[0]);
			  legend.appendChild(entry);
			});
			this.el.appendChild(legend);
		  }

		  Calendar.prototype.nextMonth = function() {
			this.current.add('months', 1);
			this.next = true;
			this.draw();
		  }

		  Calendar.prototype.prevMonth = function() {
			this.current.subtract('months', 1);
			this.next = false;
			this.draw();
		  }

		  window.Calendar = Calendar;

		  function createElement(tagName, className, innerText) {
			var ele = document.createElement(tagName);
			if(className) {
			  ele.className = className;
			}
			if(innerText) {
			  ele.innderText = ele.textContent = innerText;
			}
			return ele;
		  }
		}();

		!function() {
		  var data = [
		  ];

		  

		  function addDate(ev) {
			
		  }

		  var calendar = new Calendar('#calendar', data);

		}();
	</script>
</body>

</html>