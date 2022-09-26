
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<?php if( $current_user['id_role'] == 2 ) : ?>
							
						<div class="topbar-divider d-sm-block"></div>

						<!-- Nav Item - Top Up -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" title="top up" href="#" id="alertsDropdown" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#modalNotifTopup">
								<i class="fas fa-plus-circle fa-fw fa-lg text-primary"></i>
								<!-- Counter - Alerts -->
								<?php if ( $notif_topup ) : ?>
									<span class="badge badge-danger badge-counter">
										<?= $notif_topup; ?>
									</span>
								<?php endif; ?>
							</a>
						</li>

						<div class="topbar-divider d-sm-block"></div>

						<!-- Nav Item - Check Out -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" title="check out" href="#" id="alertsDropdown" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#modalCheckout">
								<i class="fas fa-money-bill-wave fa-fw fa-lg text-success"></i>
								<!-- Counter - Alerts -->

								<?php if ( $notif_checkout ) : ?>

									<span class="badge badge-danger badge-counter">
										<?= $notif_checkout; ?>
									</span>

								<?php endif; ?>

							</a>
						</li>

						<?php endif; ?>

                        <div class="topbar-divider d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $current_user['name'] . " (" . $current_user['role'] . ")"; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/'); ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
