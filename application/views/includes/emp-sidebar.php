<?php $session_array  = $this->session->userdata('logged_in');
//var_dump($session_array);
?>


<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <span class="nav-link"> <?php echo "Welcome ". explode(' ',$session_array['name'])[0] . "  | "; ?> </span>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>login/logout">Logout
                <span class="sr-only">(current)</span>
            </a>
        </li>

        <!--<li class="nav-item">
            <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
        </li>-->
    </ul>
</div>