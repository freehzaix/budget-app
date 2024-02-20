<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('auth.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Tableau de bord</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('auth.monprofil') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Mon profil
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-check"></i>
                <p>
                    Votre budget
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('auth.budgetfixe') }}" class="nav-link">
                        <i class="fas fa-money-bill nav-icon"></i>
                        <p>Budget fixe</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-money-bill-wave nav-icon"></i>
                        <p>Budget prévisionnel</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('auth.revenu') }}" class="nav-link">
                <i class="fas fa-money-bill nav-icon"></i>
                <p>
                    Revenu
                </p>
            </a>
        </li>
        </li>
        <li class="nav-item">
            <a href="{{ route('auth.depense') }}" class="nav-link">
                <i class="fas fa-comments-dollar nav-icon"></i>
                <p>
                    Dépense
                </p>
            </a>
        </li>
        </li>
        <li class="nav-item">
            <a href="{{ route('auth.epargne') }}" class="nav-link">
                <i class="fas fa-piggy-bank nav-icon"></i>
                <p>
                    Epargne
                </p>
            </a>
        </li>
        <li class="nav-item"> 
            <hr> 
        </li>
        <li class="nav-item">
            <a href="{{ route('auth.logout') }}" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Déconnexion</p>
            </a>
        </li>
    </ul>
</nav>
