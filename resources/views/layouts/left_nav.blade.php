<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li>
						<a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard"><i class="icon-home mr-10"></i>Dashboard</a>
					</li>
					<li>
						<a class="{{ Request::is('biodata_insert', 'questionnaire_insert', 'tipe_absensi_insert') ? 'active' : '' }}" href="javascript:void(0);" data-toggle="collapse" data-target="#master"><i class="fa fa-database mr-10"></i>Master Data <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="master" class="collapse collapse-level-1">
							<li>
								<a href="/biodata_insert">Buat Biodata Anak</a>
							</li>
							<li>
								<a href="/questionnaire_insert">Buat Questionnaire</a>
							</li>
							<li>
								<a href="/tipe_absensi_insert">Buat Tipe Absensi</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="{{ Request::is('biodata_view') ? 'active' : '' }}" href="/biodata_view"><i class="icon-folder mr-10"></i>Biodata<span class="pull-right"><span class="label label-success mr-10">4</span></span></a>
					</li>
					<li>
						<a class="{{ Request::is('jadwal_rolling') ? 'active' : '' }}" href="/jadwal_rolling"><i class="icon-calender mr-10"></i>Scheduling</a>
					</li>
					<li>
						<a class="{{ Request::is('parental_questionnaire') ? 'active' : '' }}" href="/parental_questionnaire"><i class="icon-question mr-10"></i>Questionnaire</a>
					</li>
					<li>
						<a class="{{ Request::is('daftar_absensi') ? 'active' : '' }}" href="/daftar_absensi"><i class="icon-notebook mr-10"></i>Absensi</a>
					</li>
					<li>
						<a  class="{{ Request::is('input_invoice', 'invoice_archive') ? 'active' : '' }}" href="javascript:void(0);" data-toggle="collapse" data-target="#invoice"><i class=" icon-folder-alt mr-10"></i>Faktur<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="invoice" class="collapse collapse-level-1">
							<li>
								<a href="/input_invoice">Buat Faktur</a>
							</li>
							<li>
								<a href="/invoice_archive">Daftar Faktur</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="{{ Request::is('uang_makan') ? 'active' : '' }}" href="/uang_makan"><i class="fa fa-money mr-10"></i>Uang Makan</a>
					</li>
					<li>
						<a class="{{ Request::is('user_form', 'user_view') ? 'active' : '' }}" href="javascript:void(0);" data-toggle="collapse" data-target="#User"><i class="icon-user mr-10"></i>Pengguna<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="User" class="collapse collapse-level-1">
							<li>
								<a href="/user_form">Add Pengguna</a>
							</li>
							<li>
								<a href="/user_view">View Pengguna</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /Left Sidebar Menu -->