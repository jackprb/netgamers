<!-- User signed in state. Account dropdown on screens > 576px-->
<div class="d-flex align-items-center order-lg-2 ms-auto">
	<a class="nav-link position-relative fs-4 p-2 mx-sm-1" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasPost">
		<i class="ai-image"></i>
		<span class="badge bg-primary fs-xs position-absolute end-0 top-0 me-n1" style="padding: 0.2rem 0.36rem;">3</span>
	</a>
	<a class="nav-link position-relative fs-4 p-2 mx-sm-1" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLike">
		<i class="ai-heart"></i>
		<span class="badge bg-primary fs-xs position-absolute end-0 top-0 me-n1" style="padding: 0.2rem 0.36rem;">3</span>
	</a>
	<a class="nav-link position-relative fs-4 p-2 mx-sm-1" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFollow">
		<i class="ai-user-plus"></i>
		<span class="badge bg-primary fs-xs position-absolute end-0 top-0 me-n1" style="padding: 0.2rem 0.36rem;">3</span>
	</a>
	<a class="nav-link position-relative fs-4 p-2 mx-sm-1" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasComment">
		<i class="ai-message"></i>
		<span class="badge bg-primary fs-xs position-absolute end-0 top-0 me-n1" style="padding: 0.2rem 0.36rem;">3</span>
	</a>
</div>

<div class="dropdown nav d-none d-sm-block order-lg-3">
	<div class="nav align-items-center order-lg-2 ms-auto">
		<a class="nav-link d-flex align-items-center p-0 mx-sm-4" href="#" data-bs-toggle="dropdown" aria-expanded="false">
			<img class="border rounded-circle" src="" width="48" alt="User image">
			<div class="ps-2">
				<div class="fs-xs lh-1 opacity-60">Hello,</div>
				<div class="fs-sm dropdown-toggle"><?php getLoggedInUsername(); ?></div>
			</div>
		</a>
	</div>
	<div class="dropdown-menu dropdown-menu-end my-1">
		<h6 class="dropdown-header fs-xs fw-medium text-muted text-uppercase pb-1">Account</h6>
		<a class="dropdown-item" href="#"><i class="ai-user-check fs-lg opacity-70 me-2"></i>Settings</a>
		<a class="dropdown-item" href="#"><i class="ai-settings fs-lg opacity-70 me-2"></i>View personal page</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="logout.php"><i class="ai-logout fs-lg opacity-70 me-2"></i>Sign out</a>
	</div>
</div>

<button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
<nav class="collapse navbar-collapse" id="navbarNav">
	<ul class="navbar-nav navbar-nav-scroll me-auto" style="--ar-scroll-height: 520px;">
		<li class="nav-item">
			<a class="nav-link" href="#">Home</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Account</a>
			<ul class="dropdown-menu">
				<li><a class="dropdown-item" href="#"><i class="ai-user-check fs-lg opacity-70 me-2"></i>Settings</a></li>
				<li><a class="dropdown-item" href="#"><i class="ai-settings fs-lg opacity-70 me-2"></i>View personal page</a></li>
			</ul>
		</li>
		
		<!-- User signed in state. Account dropdown on screens > 576px-->
		<li class="nav-item dropdown d-sm-none border-top mt-2 pt-2"><a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
			<img class="border rounded-circle" src="" width="48" alt="User image">
			<div class="ps-2">
				<div class="fs-xs lh-1 opacity-60">Hello,</div>
				<div class="fs-sm dropdown-toggle"><?php getLoggedInUsername(); ?></div>
			</div></a>
			<div class="dropdown-menu">
				<h6 class="dropdown-header fs-xs fw-medium text-muted text-uppercase pb-1">Account</h6>
				<a class="dropdown-item" href="#"><i class="ai-user-check fs-lg opacity-70 me-2"></i>Settings</a>
				<a class="dropdown-item" href="#"><i class="ai-settings fs-lg opacity-70 me-2"></i>View personal page</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="logout.php"><i class="ai-logout fs-lg opacity-70 me-2"></i>Sign out</a>
			</div>
		</li>
	</ul>
</nav>