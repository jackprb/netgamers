		<nav class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav me-auto ">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a href="#" onclick="getNotifications();" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
						Notifications<span id="totalNotification" class="badge bg-primary ms-2">15</span>
					</a>
					<ul class="dropdown-menu">
						<li class="nav-item">
							<a href="#" class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasPost">
								New posts<span id="postNotification" class="badge bg-primary ms-2">1</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLike">
								New likes<span id="likeNotification" class="badge bg-primary ms-2">8</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFollow">
								New followers<span id="followNotification" class="badge bg-primary ms-2">2</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#"class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasComment">
								New comments<span  id="commentNotification" class="badge bg-primary ms-2">4</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount">Account</a>
				</li>
			</ul>
        </nav>
		