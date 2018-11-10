<ul id="dropdown1" class="dropdown-content">
    <li><a href="profile.php" class="purple-text text-accent-2">profile</a></li>
    <li><a href="logOut.php" class="purple-text text-accent-2">logout</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
    <li><a href="profile.php" class="purple-text text-accent-2">profile</a></li>
    <li><a href="logOut.php" class="purple-text text-accent-2">logout</a></li>
</ul>
<nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <div class="">
            <a id="logo-container" href="./" class="brand-logo purple-text text-accent-2">EstateBD</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="./" class="purple-text text-accent-2">Home</a></li>
                <li><a href="properties.php" class="purple-text text-accent-2">All Property Posts</a></li>
                <?php if ($inSession) { ?>
                <li>
                    <a href="addProp.php" class="purple-text text-accent-2">
                        <span style="padding: 3px;border: 1px solid #e040fb;">
                            Offer Property
                        </span>
                    </a>
                </li>
                    
                    <li class="collection-item avatar">
                        <a href="#" class="purple-text text-accent-2 dropdown-button" data-activates="dropdown1" >
                            <span class="title" style="padding: 3px;border: 1px solid #e040fb;">
                                <?php echo $s_name; ?>
                            </span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a id="ofProp" href="#" class=" purple-text text-accent-2">
                        <span style="padding: 3px;border: 1px solid #e040fb;">
                            Offer Property
                        </span>
                    </a>
                </li>
                    <li>
                        <a href="#" class="logg purple-text text-accent-2" >
                            <span style="padding: 3px;border: 1px solid #e040fb;">
                                Login/Register
                            </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="#" class="purple-text text-accent-2">Home</a></li>
            <li><a href="#" class="purple-text text-accent-2">Contact Us</a></li>
            <li>
                <a href="#" class="purple-text text-accent-2">
                    <span style="padding: 3px;border: 1px solid #e040fb;">
                        Offer Property
                    </span>
                </a>
            </li>

            <?php if ($inSession) { ?>
                <li class="collection-item avatar">
                    <a href="#" class="purple-text text-accent-2 dropdown-button" data-activates="dropdown2" >
                        <span class="title" style="padding: 3px;border: 1px solid #e040fb;"><?php echo $s_name; ?></span>
                        <i class="material-icons right purple-text text-accent-2">arrow_drop_down</i>
                    </a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="#" class="logg purple-text text-accent-2" >
                        <span style="padding: 3px;border: 1px solid #e040fb;">
                            Login/Register
                        </span>
                    </a>
                </li>
            <?php } ?>

        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons purple-text text-accent-2">menu</i></a>

    </div>

</nav>